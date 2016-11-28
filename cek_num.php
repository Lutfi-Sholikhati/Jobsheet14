<?php
$input = $_GET['q'];
if (is numeric ($input))
{
	echo "Angka";
}
else
{
	echo "Bukan Angka";
}
?>