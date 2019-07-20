<?php 
class indexModel{
	private $con;

	public function __construct(){
		require_once('conexion.php');
		$this->con = new conexionModel;
	}

	public function login($rut,$contra){
		$sql = 'SELECT 	u.nombre_usuario,
						u.apellido_usuario,
						c.saldo,
						c.id_cuentas,
						u.id_usuario 
				FROM usuarios u INNER JOIN cuentas c ON u.id_usuario=c.id_usuario WHERE rut_usuario ="'.md5($rut).'" AND contra_usuario ="'.md5($contra).'" LIMIT 1';
				// echo $sql;
		return $this->con->consulta($sql); 
	}

	public function datos($rut){
		$sql = 'SELECT * FROM usuarios WHERE rut_usuario="'.md5($rut).'"';
		return $this->con->read($sql);
	}

	public function historialDepositos($rut){
		$sql = 'SELECT * FROM historicodeposito h INNER JOIN usuarios u ON h.id_usuario=u.id_usuario WHERE rut_usuario ="'.md5($rut).'"';
		return $this->con->read($sql);
	}

	public function historialTransferencia($rut){
		$sql = 'SELECT * FROM historicotransferencia h INNER JOIN usuarios u ON h.id_usuario=u.id_usuario WHERE rut_usuario ="'.md5($rut).'"';
		return $this->con->read($sql);
	}

	public function registrarDeposito($datos){
		$sql = 'INSERT INTO historicodeposito(id_usuario, rut_destino, cuenta_destino, monto, comentario, fecha) VALUES ("'.$datos['id'].'","'.$datos['rut'].'","'.$datos['cuenta'].'","'.$datos['monto'].'","'.$datos['comentario'].'","'.date('Y-m-d').'")';
		$this->con->cud($sql);
		
		$sql = 'UPDATE cuentas SET saldo = '.$datos['total'].' WHERE id_cuentas = '.$datos['id_cuenta'];
		// echo $sql;
		$this->con->cud($sql);
	}

	public function validarCuenta($cuenta){
		$sql = 'SELECT * FROM cuentas WHERE n_cuenta="'.$cuenta.'"';
		// echo $sql;
		return $this->con->consulta($sql); 
	}

	public function registrarTransferencia($datos){
		$sql = 'INSERT INTO historicotransferencia(id_usuario, rut_destino, cuenta_destino, monto, comentario, fecha) VALUES ("'.$datos['id'].'","'.$datos['rut'].'","'.$datos['cuenta'].'","'.$datos['monto'].'","'.$datos['comentario'].'","'.date('Y-m-d').'")';
		$this->con->cud($sql);
		
		$sql = 'UPDATE cuentas SET saldo = '.$datos['total'].' WHERE id_cuentas = '.$datos['id_cuenta'];
		// echo $sql;
		$this->con->cud($sql);

		$sql = 'SELECT * FROM cuentas WHERE n_cuenta = '.$datos['cuenta'];
		// echo $sql;
		$monto = $this->con->consulta($sql);

		$total = $monto['saldo'] + $datos['monto'];

		$sql = 'UPDATE cuentas SET saldo = '.$total.' WHERE n_cuenta = '.$datos['cuenta'];
		// echo $sql;
		$this->con->cud($sql);
	}

} 
?>