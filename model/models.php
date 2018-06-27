<?php
	class Model {

		public function Model()
		{
			include_once 'bdd.php';
		}
		public function Search($view)
		{

		}
		public static function TagVerif($tags)
		{
			include_once('bdd.php');
			$bdd = My_BDD::connexion();
			$req = $bdd->prepare("SELECT valeur FROM tag WHERE valeur LIKE '$tags%' LIMIT 4");

			$req->execute();

			return $req->fetchAll(PDO::FETCH_ASSOC);
		}

		public function AddTextile()
		{
			if(isset($_POST['postAdd']))
			{
				$bdd = My_BDD::connexion();

				$critere = ['categorie', 'texture', 'couleur', 'matiere'];
				$valeurs = [$_POST['categorie'], $_POST['texture'], $_POST['couleur'], $_POST['matiere']];
				$keys = array_keys($_POST);
				$index = [0, 0, 0, 0];

				$col = '';
				$val = '';
				$i = 0;
				while($i < count($critere))
				{
					$col .=  $critere[$i] . ", ";
					$val .= "':" . $keys[$i] . "', ";
					$i++;
				}
				$val = substr($val, 0, -2);
				$col = substr($col, 0, -2);

				$req = "INSERT INTO `textile` ($col) VALUES ($val)";

				$store = $bdd->prepare($req);

				$i = 0;
				while($i < count($critere))
				{
					$store->bindParam($critere[$i], $valeurs[$i]);
					$i++;
				}
				$store->execute();

				$i = 0;
				while($i < count($index))
				{
					$verif = $bdd->prepare("SELECT `nom`, `valeur` FROM `tag` WHERE `nom` = :nom AND valeur = :valeur");

					$verif->bindParam(':nom', $critere[$i]);
					$verif->bindParam(':valeur', $valeurs[$i]);

					$verif->execute();

					while($check = $verif->fetch())
					{
						$index[$i] = 1;
					}
					$i++;
				}
				$i--;
				while($i >= 0)
				{
					if($index[$i] == 0)
					{
						$tag = $bdd->prepare("INSERT INTO `tag` (`nom`, `valeur`) VALUES(:critere, :valeurs)");
						$tag->bindParam(':critere', $critere[$i]);
						$tag->bindParam(':valeurs', $valeurs[$i]);
						$tag->execute();
					}
					$i--;
				}
			}
		}
	}
?>
