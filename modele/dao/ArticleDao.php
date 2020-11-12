<?php
	require_once 'ConnexionManager.php';

	/**
	 * Classe de gestion des accès aux articles
	 */
	class ArticleDao
	{
		private $bdd;

		public function __construct()
		{
			$this->bdd = (new ConnexionManager)->getInstance();
		}

		public function getList()
		{
			$data = $this->bdd->query('SELECT * FROM Article');
			return $data->fetchAll(PDO::FETCH_CLASS, 'Article');
		}

		public function getById($id)
		{
			$data = $this->bdd->query('SELECT * FROM Article WHERE id = '.$id);
			return $data->fetch(PDO::FETCH_OBJ);
		}

		public function getByCategoryId($id)
		{
			$data = $this->bdd->query('SELECT * FROM Article WHERE categorie = '.$id);
			return $data->fetchAll(PDO::FETCH_CLASS, 'Article');
		}

		public function addArticle($titre,$contenu,$categorie){
			

    		$request = $this->bdd->prepare("INSERT into Article(titre,contenu,dateCreation,categorie) values(:titre ,:contenu,NOW(),:categorie)");
   		 	$request->execute(array(
        		'titre'  => $titre,
        		'categorie' => $categorie,
        		'contenu' => $contenu
    			));
   		 
    		return 1;
			
		}


		public function editArticle($id, $titre, $contenu, $categorie){

		 $request = $this->bdd->prepare("UPDATE Article set titre=:titre,contenu=:contenu,categorie=:categorie  WHERE id=:id");
    	
    	$result = $request->execute(array(
            'id' => $id,
            'titre' => $titre,
            'contenu' => $contenu,
            'categorie' => $categorie,
    		));
    	
    	return 1;

		}


		 public function deleteArticle($id){

	    $request = $this->bdd->prepare("DELETE from Article  WHERE id=:id");
    	$request->execute(array(
            'id' => $id
    ));
    return 1;
}
	}
?>