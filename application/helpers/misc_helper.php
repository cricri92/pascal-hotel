<?php 

function pre($data)
{
	echo "<pre>".print_r($data, true)."</pre>";
}

function die_pre($data)
{
	echo "<pre>".print_r($data, true)."</pre>";
	die();
}

?>