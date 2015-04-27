<?php
$startTime = microtime(true);


require_once('./config.php');
require_once(SD_LIBDIR.'lib.db.php');
require_once(SD_LIBDIR.'lib.user.php');
require_once(SD_LIBDIR.'lib.passwd.php');
require_once(SD_LIBDIR.'lib.categories.php');
require_once(SD_LIBDIR.'lib.dials.php');
require_once(SD_LIBDIR.'lib.htmlformatter.php');

$user = new User();
$user->authenticateUser('ngz', $tempPassword);

if ($user->authenticated) {

    $categories = new Categories($user);
    $categories->getCategoryList();

    $dials = new Dials($categories);
    $dials->getDials();

    $htmlOut = new HtmlFormatter($dials);

    $categoryList = $htmlOut->generateCategoryHeaders();
    $dialList = $htmlOut->generateDials();
    $paneList = $htmlOut->generateTabPanes();

}




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
	<nav>
        <!-- PUT CATEGORY TABS HERE -->
        <?php echo $categoryList; ?>
    </nav>
    <div class="headerLogo">
        <!-- PUT LOGO BRANDING HERE -->
        <span>SPEEDDIAL</span>
    </div>
</header>

<div class="paneContainer">
    <!-- PUT DIAL PANES HERE -->

</div>

<?php $endTime = microtime(true); ?>
<div class="debugdata">
    <div>Debug Data</div>
    <div>*** DIALS OBJECT ***</div>
    <?php var_dump($dials); ?>
    <div>*** <b>END</b> DIALS OBJECT ***</div>
    <div>*** CATEGORIES OBJECT ***</div>
    <?php var_dump($categories); ?>
    <div>*** <b>END</b> CATEGORIES OBJECT ***</div>
</div>
<div class="benchmark">
	<div>Execution Time: &nbsp; <?php echo (round(($endTime - $startTime) * 1000, 4)); ?>ms</div>
</div>
</body>
</html>