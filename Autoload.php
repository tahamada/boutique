<?php
function loadClass($classe){
	if(file_exists('class/'.$classe .'.php'))
		include 'class/'.$classe .'.php';
	if(file_exists('class/interface/'.$classe .'.php'))
		include 'class/interface/'.$classe .'.php';
	if(file_exists('funct/'.$classe .'.php'))
		include 'funct/'.$classe .'.php';
        /*if(file_exists('./'.$classe .'.php'))
		include './'.$classe .'.php';*/
}
spl_autoload_register('loadClass');	
?>