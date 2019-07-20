<?php 
session_start();

$function = $_GET['action'];
$index = new indexController ;
$index->$function();
class indexController{
	private $con;

	public function __construct(){
		require_once('../model/index.php');
		$this->con = new indexModel;
	}

	public function index(){
		if (!empty($_SESSION['acceso'])) {
			$param = array('tpl'=>'tpl-home.php');
			require_once('../index.php');
		}else{
			$param = array('tpl'=>'tpl-login.php');
			require_once('../tpl-index_login.php');
		}
	}

	public function login(){
		$rut = $this->valida_rut($_POST['rut']);
		if($rut == false){
			echo json_encode(1);
			exit;
		}else{
			$acceso = $this->con->login($_POST['rut'],$_POST['contra']);
			if ($acceso) {
				$_SESSION['acceso']			= true;
				$_SESSION['rut']			= $_POST['rut'];
				$_SESSION['nombre']			= $acceso['nombre_usuario'];
				$_SESSION['apellido']		= $acceso['apellido_usuario'];
				$_SESSION['saldo']			= $acceso['saldo'];
				$_SESSION['id_cuenta']		= $acceso['id_cuentas'];
				$_SESSION['id_usuario']		= $acceso['id_usuario'];
				echo json_encode(3);
			}else{
				echo json_encode(2);
			}
		}
	}


	public function deposito($success = false){
		$historico = $this->con->historialDepositos($_SESSION['rut']);
		$param = array('tpl'=>'tpl-deposito.php');
			require_once('../index.php');
	}

	public function depositar(){

		$total = $_SESSION['saldo'] - $_POST['monto'];
		$datos = array(	'rut'		=>	$_POST['rut'],
						'cuenta'	=>	$_POST['cuenta'],
						'monto'		=>	$_POST['monto'],
						'comentario'=>	$_POST['comentario'],
						'id'		=>  $_SESSION['id_usuario'],
						'id_cuenta'		=>  $_SESSION['id_cuenta'],
						'total'		=> $total);
		$historico = $this->con->registrarDeposito($datos);
		$_SESSION['saldo'] = $total;
		$this->deposito($success = true);
	}

	public function transferencia($success = false){
		$historico = $this->con->historialTransferencia($_SESSION['rut']);
		$param = array('tpl'=>'tpl-transferencia.php');
			require_once('../index.php');
	}

	public function validarCuenta(){
		$resultado = $this->valida_rut($_POST['rut']);
		$cuenta = $this->con->validarCuenta($_POST['cuenta']);

		if($resultado == true AND !empty($cuenta['n_cuenta'])){
			echo json_encode(1);
		}else{
			echo json_encode(2);
		}
	}

	public function transferir(){
		$total = $_SESSION['saldo'] - $_POST['monto'];
		$datos = array(	'rut'		=>	$_POST['rut'],
						'cuenta'	=>	$_POST['cuenta'],
						'monto'		=>	$_POST['monto'],
						'comentario'=>	$_POST['comentario'],
						'id'		=>  $_SESSION['id_usuario'],
						'id_cuenta'	=>  $_SESSION['id_cuenta'],
						'total'		=> $total);
		$historico = $this->con->registrarTransferencia($datos);
		$_SESSION['saldo'] = $total;
		$this->transferencia($success = true);
	}







	public function validarRut(){
		$resultado = $this->valida_rut($_POST['rut']);
		if($resultado == false){
			echo json_encode(1);
		}else{
			echo json_encode(2);
		}
	}

	public function valida_rut($rut){
	    $rut = preg_replace('/[^k0-9]/i', '', $rut);
	    $dv  = substr($rut, -1);
	    $numero = substr($rut, 0, strlen($rut)-1);
	    $i = 2;
	    $suma = 0;
	    foreach(array_reverse(str_split($numero)) as $v)
	    {
	        if($i==8)
	            $i = 2;
	        $suma += $v * $i;
	        ++$i;
	    }
	    $dvr = 11 - ($suma % 11);
	    
	    if($dvr == 11)
	        $dvr = 0;
	    if($dvr == 10)
	        $dvr = 'K';
	    if($dvr == strtoupper($dv))
	        return true;
	    else
	        return false;
	}

	public function close(){
		session_destroy();
		$param = array('tpl'=>'tpl-login.php');
		require_once('../tpl-index_login.php');
	}
} 
?>