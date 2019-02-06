<?php include_once 'dependencias.php' ?>


<h2 class="text-center">
	Pagina de Cadastro <i class="fa fa-user-plus"></i>
</h2>
<br>

	<form method="POST" action="../controller/insert_client.php">
		
	<div class="container">
		

 		<div class="form-row">

 			<div class="col-md-6">
 				Nome: <i></i>
 				<input class="form-control"  type="text" name="name" required autofocus><br>
 			</div>

 			<div class="col-md-6">
 				E-mail: <i></i>
 				<input class="form-control"  type="email" name="email" required autofocus><br>
 			</div>
 			
 			<div class="col-md-4">
 				CPF: <i></i>
 				<input class="form-control"  type="text" name="cpf" required autofocus id="cpf"><br>
 			</div>

 			<div class="col-md-4">
 				Data Nasc.: <i></i>
 				<input class="form-control"  type="date" name="birth" required autofocus id="datefield"><br>
 			</div>

 			<div class="col-md-4">
 				Telefone: <i></i>
 				<input class="form-control" type="text" name="phone" required autofocus id="phone"><br>
 			</div>

 			<div class="col-md-12">
 				Endereço: <i></i>
 				<input class="form-control" type="text" name="address" required autofocus><br>
 			</div>

 			<div class="col-md-2">
 				Valor: <i></i>
 				<input class="form-control" type="number" name="value" min="1" max="100000" required autofocus id="real"><br>
 			</div>

 			<div class="col-md-1">
 				Desconto: <i></i>
 				<input class="form-control" type="number" name="off" min="1" max="100" required autofocus><br>
 			</div>
 			</div><br>
 			<div class="col-md-4">
 				<button class="btn btn-primary btn-lg">
 					Inserir Cliente<i class="fa fa-user-plus"></i>
 				</button>

 				<a style="margin: 2px" class="btn btn-secondary btn-lg" href="../index.php">Voltar</a>

 			</div>

 			
 		</div>



	</div>
	</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/currencyformatter.js/2.2.0/currencyFormatter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 

<script type="text/javascript">
	$(document).ready(function(){
		$("#cpf").mask("000.000.000-00")
		$("#phone").mask("(00) 0 0000-0000")
		OSREC.CurrencyFormatter.formatEach('#real');

	})

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
 		if(dd<10){
        	dd='0'+dd
    	} 
    	if(mm<10){
       		mm='0'+mm
    	} 

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById("datefield").setAttribute("max", today);

</script>