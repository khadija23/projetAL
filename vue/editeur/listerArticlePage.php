<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualités MGLSI</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<?php require_once 'inc/entete.php'; ?>
	<div id="">
		<?php if (!empty($articles)): ?>

			<?php foreach ($articles as $article): ?>
				<div class="article">
					<h1><a href="index.php?action=article&id=<?= $article->id ?>"><?= $article->titre ?></a></h1><button><a href="index.php?action=supprimer&id=<?= $article->id ?>"> supprimer</a></button>
					<button><a href="index.php?action=modifier&id=<?= $article->id ?>">modifier</a></button>
					<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<div class="message">Aucun article trouvé</div>
		<?php endif ?>
	</div>
	
</body>
</html>