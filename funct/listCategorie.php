<?php
	$mCategorie=Manager::getInstance();
	$mCategorie::setTable("Categorie");
	$listeoCategorie=$mCategorie::lister();
?>