<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form id="ajout" role="form" action="/projetDiop/index.php" method="POST"  >

		<input type="text" name="article_id" id="article_id" value="<?php echo $article->id ?>" hidden>

		<label for="titre">Titre</label>
		<input type="text" name="titre" id="titre" value="<?php echo $article->titre ?>">
		
		<label for="contenu">Contenu</label>
		<input type="text-area" name="contenu" id="contenu" value="<?php echo $article->contenu ?>">
		<label for="categorie">Categorie</label>

	<select name="categorie" id="categorie" form="ajout">
		
		<?php foreach ($categories as $category) {
			
			if($category->id === $categorie->id){

				echo "<option value=$category->id selected>$category->libelle</option>";

			}else{

				echo "<option value=$category->id>$category->libelle</option>";

			}


		} 

		?>
		   
			
		</select>

		 <button type="submit"  name="modifier" >Enregistrer les modifications</button>
	</form>
	
</body>
</html>