<?php
interface enregistrable
{
	public static function lister($value,$column);
	public static function enregistrer($objet,$update);
	public static function supprimer($objet);
}
?>