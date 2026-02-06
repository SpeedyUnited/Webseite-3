<?php
$pageTitle = $pageTitle ?? 'Seite';

/** Cache-Busting: hängt ?v=<timestamp> an, damit der Browser bei Änderungen neu lädt. */
function asset_url(string $path): string {
	$file = __DIR__ . '/' . $path;
	$version = file_exists($file) ? filemtime($file) : time();
	return htmlspecialchars($path) . '?v=' . $version;
}
?>
<!doctype html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo htmlspecialchars($pageTitle); ?></title>
	<link rel="stylesheet" href="<?php echo asset_url('css/styles.css'); ?>">
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
