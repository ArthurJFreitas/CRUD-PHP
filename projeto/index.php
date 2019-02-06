<?php 
   include_once 'model/Conexao.php';
   include_once 'model/Manager.php';

   $manager = new Manager();



 ?>


<!DOCTYPE html>
<html>
<head>
	<?php 
	include_once 'view/dependencias.php' 
	?>
</head>
<body>


	<div class="container">
		
		<h2 class="text-center">
			 <i class="fa fa-list"></i> Lista De Clientes
		</h2>

		<h5 class="text-right">
			<a href="view/page_register.php" class="btn btn-primary btn-xs">
				<i class="fa fa-user-plus"></i>
			</a>

		</h5>


		<div class="table-responsive">
			
			<table class="table table borderless table-dark">
				
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>NOME</th>
						<th>EMAIL</th>
						<th>CPF</th>
						<th>DATA DE NASC.</th>
						<th>ENDEREÇO</th>
						<th>TELEFONE</th>
						<th>VALOR</th>
						<th>DESCONTO</th>
						<th>TOTAL</th>
						<th colspan="1">AÇOES</th>
					</tr>
				</thead> 


				<tbody>
					<?php foreach($manager->listClient("registros") as $client):?>
					<tr>
						<td><?php echo $client['id']; ?></td> 
						<td><?php echo $client['name']; ?></td> 
						<td><?php echo $client['email']; ?></td> 
						<td><?php echo $client['cpf']; ?></td> 
						<td><?php echo date("d/m/Y", strtotime($client['birth'])); ?></td> 
						<td><?php echo $client['address']; ?></td> 
						<td><?php echo $client['phone']; ?></td> 
						<td><?php echo $client['value']; ?></td> 
						<td><?php echo $client['off']; ?></td> 
						<?php endforeach; ?>
						<?php foreach($manager->calcClient("registros") as $clientcalc):?>
						<td><?php echo $clientcalc['desconto']; ?></td>
						<td>
							<form method="POST" action="view/page_update.php">
								<input type="hidden" name="id" value="<?=$client['id']?>">
								<button class="btn btn-info btn-xs">
									<i class="fa fa-user-edit"></i>
								</button>
							</form>
						</td> 
						<td>
							<form method="POST" action="controller/delete_client.php" onclick="return confirm('Você tem certeza que deseja excluir?');">
								<button class="btn btn-danger btn-xs">
									<input type="hidden"name="id" value="<?=$client['id']?>">
									<i class="fa fa-trash"></i>
								</button>
							</form>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>	

			</table>



		</div>


	</div>


</body>



</html>