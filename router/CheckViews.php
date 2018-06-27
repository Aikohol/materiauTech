<?php

class My_Router {
	public static function Index_Check($view, $model)
	{
		if($_SESSION == NULL && !isset($_GET['search']))
		{
			$content = $view->SearchBar();
			$content .= $view->AddTextile();
			$content .= $model->AddTextile();
		}
		elseif($_SESSION == NULL && isset($_GET['postSearch']))
		{
			$content = $view->SearchBar();
			$content .= $model->Search($view);
		}
		else
		{
			$content = $view->Connexion();
		}
		require 'public/template.php';
	}
}
?>
