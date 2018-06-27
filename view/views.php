<?php
	class View {
		public function Connexion()
		{
			ob_start();
			?>
			<form action='#' method='post' class='connexion'>
				<input type='password' name='pwd'>
				<input type='submit' value='Se connecter' name='post'>
			</form>
			<?php return ob_get_clean();
		}
		public function SearchBar()
		{
			ob_start();
			?>
			<form action='#' method='GET' class='search' id='parentInput'>
				<div id='inputDiv'>
					<input type='text' name='search' placeholder='Votre recherche...' id='input' autocomplete="off">
				</div>
				<input type='submit' name='postSearch' value='rechercher' id='recherche'>
			</form>
			<script src='public/js/searchTag.js'></script>
			<?php
			return ob_get_clean();
		}
		public function AddTextile()
		{
			ob_start();
			?>
			<form action='#' method='POST' class='AddTextile'>
				<input type='text' name='categorie'>
				<input type='text' name='texture'>
				<input type='text' name='couleur'>
				<input type='text' name='matiere'>
				<input type='submit' name='postAdd' value='Ajouter'>
			</form>
			<?php return ob_get_clean();
		}
	}
?>
