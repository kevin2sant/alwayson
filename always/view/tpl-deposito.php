<?php if (!empty($success)): ?>
	<div class="alert alert-success">
	  <strong>Exitoso!</strong> Deposito hecho con exito.
	</div>
<?php endif ?>
<h4>Deposito</h4>

<form action="./index.php?action=depositar" method="post">
	<div class="container">
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Rut de Destinatario</label>
	    <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT">
	    <em><label class="text-danger" id="msgerrorrut"></label></em>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Cuenta de Destinatario</label>
	    <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="Cuenta">
	    <em><label class="text-danger" id="msgerrorcuenta"></label></em>
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlInput1">Monto</label>
	    <input type="number" class="form-control" id="monto" name="monto" placeholder="Monto a depositar">
	    <em><label class="text-danger" id="msgerror"></label></em>
	  </div>
	  
	  <div class="form-group">
	    <label for="exampleFormControlTextarea1">Comentario</label>
	    <textarea class="form-control" id="exampleFormControlTextarea1" value=" " name="comentario" rows="3"></textarea>
	  </div>
	</div>
</form>
<center><em><label class="text-danger" id="msgerrorgen"></label></em></center><br>
<button id="depositar" class="btn btn-success">Depositar</button>
<button id="historico" data-toggle="modal" data-target="#depositoHistorial" class="btn btn-info" style="float:right;">Historico</button>
<div class="modal fade" id="depositoHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Historial de Depositos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table tabel-hover table-bordered table-responsive table-striped">
        	<thead>
        		<td>Rut Destino</td>
        		<td>Cuenta Destino</td>
        		<td>Monto Depositado</td>
        		<td>Comentario</td>
        		<td>Fecha Deposito</td>
        	</thead>
        	<tbody>
        		<?php foreach ($historico as $key): ?>
        			<tr>
        				<td><?=$key['rut_destino']?></td>
        				<td><?=$key['cuenta_destino']?></td>
        				<td><?=$key['monto']?></td>
        				<td><?=$key['comentario']?></td>
        				<td><?=$key['fecha']?></td>
        			</tr>
        		<?php endforeach ?>
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>