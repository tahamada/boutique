<?php
interface enregistrable
{
	public function lister($value,$column);
	public function enregistrer($objet,$update);
	public function supprimer($objet);
}
?>