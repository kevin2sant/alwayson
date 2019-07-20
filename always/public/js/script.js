$(function(){
	$('#ingresar').click(function(){
		if ($('#rut').val()!='' || $('#contra').val()!=''){
			$.ajax({
				type:'post',
				url:'http://localhost/always/controller/index.php?action=login',
				dataType:'json',
				data: {
						rut : $('#rut').val(),
						contra : $('#contra').val()
					  }
			})
			.done(function(data){
				if (data == 1){
					$('#msgerror').text('El formato del rut es incorrecto')
				}else if (data == 2){
					$('#msgerror').text('Usuario o Contraseña invalida')
				}else{
					window.location = '../controller/index.php?action=index'
				}
			})
		}else{
			$('#msgerror').text('Todos los campos son obligatorios')
		}
	})

	$('#depositar').click(function(){
		var paso1 = 1
		var paso2 = 1
		var paso3 = 1

		montoDisponible = $('#montoDisponible').text()
		montoEnviado 	= $('#monto').val()

		montoFinal 		= montoDisponible - montoEnviado
		
		if (montoFinal < 0){
			$('#msgerror').text('El monto ingresado supera el monto disponible en su cuenta')
			paso1 = 1
		}else{
			$('#msgerror').text('')
			paso1 = 2
		}

		$.ajax({
			async:false,
			type:'post',
			url:'http://localhost/always/controller/index.php?action=validarRut',
			dataType:'json',
			data: {
					rut : $('#rut').val()
				  }
		})
		.done(function(data){
			if (data == 1){
				$('#msgerrorrut').text('El formato del rut es incorrecto')
				paso2 = 1
			}else{
				$('#msgerrorrut').text('')
				paso2 = 2
			}
		})

		if ($('#cuenta').val() == ''){
			$('#msgerrorcuenta').text('Es obligatorio este campo')
			paso3 = 1
		}else{
			$('#msgerrorcuenta').text('')
			paso3 = 2
		}

		if (paso1==1 || paso2==1 || paso3==1) {
			$('#msgerrorgen').text('Todos los campos son obligatorios')
		}else{
			$('form').submit()
		}
	})



	$('#transferir').click(function(){
		var paso1 = 1
		var paso2 = 1
		var paso3 = 1

		montoDisponible = $('#montoDisponible').text()
		montoEnviado 	= $('#monto').val()

		montoFinal 		= montoDisponible - montoEnviado
		
		if (montoFinal < 0){
			$('#msgerror').text('El monto ingresado supera el monto disponible en su cuenta')
			paso1 = 1
		}else{
			$('#msgerror').text('')
			paso1 = 2
		}

		$.ajax({
			async:false,
			type:'post',
			url:'http://localhost/always/controller/index.php?action=validarCuenta',
			dataType:'json',
			data: {
					rut : $('#rut').val(),
					cuenta : $('#cuenta').val()
				  }
		})
		.done(function(data){
			if (data == 2){
				$('#msgerrorrut').text('El rut o la cuenta son incorrectos')
				paso2 = 1
			}else{
				$('#msgerrorrut').text('')
				paso2 = 2
			}
		})

		if ($('#monto').val() == ''){
			$('#msgerror').text('Es obligatorio este campo')
			paso3 = 1
		}else{
			$('#msgerror').text('')
			paso3 = 2
		}
		
		if (paso1==1 || paso2==1 || paso3==1) {
			$('#msgerrorgen').text('Todos los campos son obligatorios')
		}else{
			$('form').submit()
		}
	})
})