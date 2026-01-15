<?php
$pageTitle = $pageTitle ?? 'Seite';
?>
<!doctype html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo htmlspecialchars($pageTitle); ?></title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header class="site-header">
		<div class="container">
			<nav class="site-nav">
				<a href="index.php">Start</a>
				<a href="contact.php">Kontakt</a>
				<a href="impressum.php">Impressum</a>
				<a href="datenschutz.php">Datenschutz</a>
				<a href="agb.php">AGB</a>
				<a href="about.php">Über</a>
			</nav>
		</div>
	</header>

	<main class="container">
