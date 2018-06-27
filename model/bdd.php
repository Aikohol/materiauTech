<?php
	class My_BDD {

		public function connexion(){
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=casa93_textile;charset=utf8', 'root', '');
			}
			catch (PDOexception $e) {
				die('Erreur : ' . $e->getMessage());
			}
			return $bdd;
		}
	}
?>
