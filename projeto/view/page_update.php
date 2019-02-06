<?php 

  include_once '../model/Conexao.php';
  include_once '../model/Manager.php';
  include_once 'dependencias.php';

  $manager = new Manager(); 

  $id = $_POST['id'];

?>


<h2 class="text-center">
	Pagina de Atualição <i class="fa fa-user-plus"></i>
</h2>
<br>

	<form method="POST" action="../controller/update_client.php">
		
	<div class="container">
		
		<<?php foreach ($manager->getInfo("registros", $id) as $client_info): ?>

 			<div class="form-row">

 			<div class="col-md-6">
 				Nome: <i></i>
 				<input class="form-control"  type="text" name="name" required autofocus value="<?=$client_info['name']?>"><br>
 			</div>

 			<div class="col-md-6">
 				E-mail: <i></i>
 				<input class="form-control"  type="email" name="email" required autofocus value="<?=$client_info['email']?>"><br>
 			</div>
 			
 			<div class="col-md-4">
 				CPF: <i></i>
 				<input class="form-control"  type="text" name="cpf" required autofocus id="cpf" value="<?=$client_info['cpf']?>"><br>
 			</div>

 			<div class="col-md-4">
 				Data Nasc.: <i></i>
 				<input class="form-control"  type="date" name="birth" required autofocus id="datefield" value="<?=$client_info['birth']?>"><br>
 			</div>

 			<div class="col-md-4">
 				Telefone: <i></i>
 				<input class="form-control" type="text" name="phone" required autofocus id="phone" value="<?=$client_info['phone']?>"><br>
 			</div>

 			<div class="col-md-12">
 				Endereço: <i></i>
 				<input class="form-control" type="text" name="address" required autofocus value="<?=$client_info['address']?>"><br>
 			</div>

 			<div class="col-md-2">
 				Valor: <i></i>
 				<input class="form-control" type="number" name="value" min="1" max="100000" required autofocus id="real" value="<?=$client_info['value']?>"><br>
 			</div>

 			<div class="col-md-1">
 				Desconto: <i></i>
 				<input class="form-control" type="number" name="off" min="1" max="100" required autofocus value="<?=$client_info['off']?>"><br>
 			</div>
 			</div><br>
 			<div class="col-md-4">
 				<input type="hidden" name="id" value="<?=$client_info['id']?>">
 				<?php endforeach ?>
 				<button class="btn btn-warning btn-lg">
 					Atualizar Cliente<i class="fa fa-user-edit"></i>
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