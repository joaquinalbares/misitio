<?php

$action = $_GET['action'] ?? 'home';

switch ($action) {
	case 'about':
		$message = 'About page';
		break;
	case 'home':
		$message = 'Welcome to my site';
		break;
	default:
		http_response_code(404);
		$message = 'Page not found';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></title>
</head>

<body>
	<h1><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></h1>
</body>

</html>