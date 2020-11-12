<?php
	require_once 'controleur/Controller.php';
	$categ;
	$controller = new Controller();




	if (!isset($_GET['action'])){
		if (isset($_GET['a'])) {
			
			if (strtolower($_GET['a']) === 'lister') {
				
				$controller->showAllArticle();
			}
			else if (strtolower($_GET['a']) === 'add') {	
				echo "hiii";
				$controller->ajouterArticlePage();
			}else if (strtolower($_GET['a']) === 'edit') {	
				
				$controller->modifierArticlePage();
			}
		}
		//echo "hihi";
		// else if (isset($_GET['a'])) {
		// 	if (strtolower($_GET['a']) === 'supprimer') {	
		// 		$controller->showAllArticle();
		// 	}
		// }
		
			
		
		else if ((isset($_REQUEST['login'])) && (isset($_REQUEST['password']))){
				$controller->showAccueilEditeur($_REQUEST['login'],$_REQUEST['password']);
		}
		
	

		// else if((isset($_REQUEST['titre'])) && (isset($_REQUEST['contenu'])) && (isset($_REQUEST['categorie']))){
		else if(isset($_POST['ajouter'])){
			
			$choix = $_REQUEST['categorie'];
			if ($choix=='politique')
			{
				$categ=1;
			}

			elseif ($choix=='societe')
			{
				$categ=2;
			}

			elseif ($choix=='religion'){
				$categ=3;
			}

			//echo "hello";
			$controller->ajoutArticle($_REQUEST['titre'],$_REQUEST['contenu'],$categ);


		}elseif(isset($_POST['modifier'])){

			$id = $_POST['article_id'];

			$titre = $_POST['titre'];

			$contenu = $_POST['contenu'];

			$categorie = (int)$_POST['categorie'];

			$controller->modifierArticle($id,$titre,$contenu,$categorie);

		}
		else {
			$controller->showAccueil();
		}
		
	}
	// else
	// 	if (strtolower($_GET['action']) === 'connexionediteur')
	// {
	// 	echo (''.$_GET['login']);
	// 	echo "iccci";
	// }

	else if(strtolower($_GET['action']) === 'ajouter'){
			$controller->ajouterArticlePage();
		}
	
	else{

		if (strtolower($_GET['action']) === 'article'){

			if (isset($_GET['id'])){
				$controller->showArticle($_GET['id']);
			}
			else{
				$controller->ShowErrorPage();
			}
		}
		else if (strtolower($_GET['action']) === 'supprimer'){

			if (isset($_GET['id'])){
				$controller->deleteArticle($_GET['id']);
			}
			else{
				$controller->ShowErrorPage();
			}
		}

		else if (strtolower($_GET['action']) === 'modifier'){

			if (isset($_GET['id'])){
				$article = $controller->getArticle($_GET['id']);
	
				$categorie = $controller->getCategorie($article->categorie);

				$categories = $controller->getCategories();

				require './vue/editeur/editArticle.php';
			}

			else{
				$controller->ShowErrorPage();
			}
		}

		else if (strtolower($_GET['action']) === 'categorie'){

			if (isset($_GET['id'])){
				$controller->showCategorie($_GET['id']);
			}

			else{
				$controller->ShowErrorPage();
			}
		}

		else{
			$controller->showAccueil();
		}
	}
?>