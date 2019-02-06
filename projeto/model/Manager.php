<?php 


	class Manager extends Conexao{

		public function insertClient($table, $data){
			
			$pdo = parent::get_instance(); //Abre Conexao
			$fields = implode(",", array_keys($data)); // prepara os dados
			$values = ":".implode(", :", array_keys($data)); // coloca os dados em array
			$sql = "INSERT INTO $table ($fields) VALUES ($values)"; // insere os arrays nos campos 'SQL'
			$statemant = $pdo->prepare($sql); // prepara o sql

			foreach ($data as $key => $value) { // adiciona dados como chaves nos valores
				$statemant -> bindValue(":$key", $value, PDO::PARAM_STR); // prepara o banco
			}

			$statemant->execute(); //executa
		}

		public function listClient($table){
			$pdo = parent::get_instance();
			$sql = "SELECT * FROM $table ORDER BY name ASC";
			$statemant = $pdo->query($sql);
			$statemant->execute();
			return $statemant->fetchAll();
		}	

		public function calcClient($table){
			$pdo = parent::get_instance();
			$sql = "SELECT *, value-(off/100*value) AS desconto FROM $table";
			$statemant = $pdo->query($sql);
			$statemant->execute();
			return $statemant->fetchAll();


	}


		public function deleteClient($table, $id){
			$pdo = parent::get_instance();
			$sql = "DELETE FROM $table WHERE id = :id";
			$statemant = $pdo->prepare($sql);
			$statemant->bindValue(":id", $id);
			$statemant->execute();
		}


		public function getInfo($table, $id){
			$pdo = parent::get_instance();
			$sql = "SELECT * FROM $table WHERE id = :id";
			$statemant = $pdo->prepare($sql);
			$statemant->bindValue(":id", $id);
			$statemant->execute();

			return $statemant->fetchAll();

		}


		public function updateClient($table, $data, $id){
			$pdo = parent::get_instance();
			$new_values = "";
			foreach ($data as $key => $value) {
				$new_values .= "$key=:$key, ";
			}
			$new_values = substr($new_values, 0, -2);
			$sql = "UPDATE $table SET $new_values WHERE id = :id"; 
			$statemant = $pdo->prepare($sql);
			foreach ($data as $key => $value) {
				$statemant->bindValue(":$key", $value, PDO::PARAM_STR);
			}
		$statemant->execute();
		}


 }

 ?>