<?php
require "vendor/autoload.php";
$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('ajoutArticle.html', array());
?>