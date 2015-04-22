<?php
$startTime = microtime(true);
//$saltSize = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
//$salted = mcrypt_create_iv($saltSize, MCRYPT_DEV_RANDOM);

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
<div class="benchmark">
	<div>Execution Time: &nbsp; <?php echo (round(($endTime - $startTime) * 1000, 4)); ?>ms</div>
</div>
</body>
</html>