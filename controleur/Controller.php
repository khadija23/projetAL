<?php
	require_once 'modele/dao/ArticleDao.php';
	require_once 'modele/dao/UserDao.php';
	require_once 'modele/dao/CategorieDao.php';
	require_once 'modele/domaine/Article.php';
	require_once 'modele/domaine/Categorie.php';
	require_once 'modele/domaine/User.php';

	/**
	 * Classe représentant notre controleur principal
	 */
	class Controller
	{
		
		function __construct()
		{
			
		}

		public function showAccueil()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/accueil.php';
		}
		public function showAccueilEditeur($login,$password)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$userDao= new UserDao();
			$test=$userDao->testEditeur($login,$password);
			if ($test) {
				$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			require_once 'vue/editeur/accueilEditeur.php';
			}
			else{

				echo "username ou mot de passe incorrect";
			}
			
		}
		public function ajoutArticle($contenu,$categorie,$titre)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();
			$userDao= new UserDao();
			$articleDao->addArticle($contenu,$categorie,$titre);
			$articles = $articleDao->getList();
			$categories = $categorieDao->getList();
			
			header("location: ?a=lister");
				
		}


		public function modifierArticle($id, $titre, $contenu, $categorie){

			$articleDao = new ArticleDao();

			$articleDao->editArticle($id, $titre, $contenu, $categorie);

			header("location: ?a=lister");
		}


		public function getArticle($id){

			$articleDao = new ArticleDao();

			$article = $articleDao->getById($id);

			return $article;
		}

		public function getCategorie($id){

			$categorieDao = new CategorieDao();

			$categorie = $categorieDao->getById($id);

			return $categorie;
		}

		public function getCategories(){

			$categorieDao = new CategorieDao();

			$categories = $categorieDao->getList();
			
			return $categories;

		}



		public function showArticle($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$article = $articleDao->getById($id);
			$categories = $categorieDao->getList();
			require_once 'vue/article.php';
		}

		public function showAllArticle()
		{
			$articleDao = new ArticleDao();
			// $categorieDao = new CategorieDao();

			$articles = $articleDao->getList();
			
			require_once 'vue/editeur/listerArticlePage.php';
		}
		public function showCategorie($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articles = $articleDao->getByCategoryId($id);
			$categories = $categorieDao->getList();
			require_once 'vue/articleByCategorie.php';
		}
		public function deleteArticle($id)
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			$articleDao->deleteArticle($id);
			 $articles = $articleDao->getList();
			header("location: ?a=lister");
		}

		public function showAllCategorie()
		{
			$articleDao = new ArticleDao();
			$categorieDao = new CategorieDao();

			
			$categories = $categorieDao->getList();
			return $categories;

			
		}
		public function ajouterArticlePage(){
			
			require_once 'vue/editeur/ajoutArticlePage.php';
		}
	}
?>