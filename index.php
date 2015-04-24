<?php
$startTime = microtime(true);
/*
$plainPasswd = 'ThisIsMyPassword';
$cryptOptions = Array('cost' => 12);
echo '<pre>'."\n".'Original Hash: ';
$hashedPasswd = password_hash($plainPasswd, PASSWORD_BCRYPT, $cryptOptions);
echo $hashedPasswd;
echo "\n";
echo '     Verified: ';
echo password_verify($plainPasswd.'derp', $hashedPasswd);
echo '</pre>';
*/

require_once('./config.php');
require_once(SD_LIBDIR.'lib.db.php');
require_once(SD_LIBDIR.'lib.user.php');
require_once(SD_LIBDIR.'lib.passwd.php');

$user = new User();
$user->authenticateUser('ngz', $tempPassword);







?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Speddial Web 0.01</title>
<!-- JS -->
<script type="text/javascript" src="lib/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="lib/speeddial.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="css/slate/style.css" />
</head>

<body>
<header>
	<h1 class="catTitle">Main</h1>

</header>

<?php $endTime = microtime(true); ?>
<div class="debugdata"><?php var_dump($user); ?></div>
<div class="benchmark">
	<div>Execution Time: &nbsp; <?php echo (round(($endTime - $startTime) * 1000, 4)); ?>ms</div>
</div>
</body>
</html>