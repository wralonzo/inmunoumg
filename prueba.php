<?php


$string = 'hola mundo buenos val';

$palabras = explode(' ', $string);

usort(
	$palabras,
	function ($a, $b) {
		return strlen($b) - strlen($a);
	}
);

$largo = $palabras[0];

echo $largo;
