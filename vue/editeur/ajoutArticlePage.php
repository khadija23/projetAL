<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form id="ajout" role="form" action="/projetDiop/index.php" method="POST"  >

		<label for="titre">Titre</label>
		<input type="text" name="titre" id="titre">
		
		<label for="contenu">Contenu</label>
		<input type="text-area" name="contenu" id="contenu">
		<label for="categorie">Categorie</label>
	<select name="categorie" id="categorie" form="ajout">
		
			<option value="">--Please choose an option--</option>
		    <option value="politique">Politique</option>
		    <option value="societe">Societe</option>
		    <option value="religion">Religion</option>
		   
			
		</select>

		 <button type="submit"  name="ajouter" >ajouter</button>
	</form>
	
</body>
</html>