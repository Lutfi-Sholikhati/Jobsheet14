<?php
mysql_connect("localhost","root",""); // {user dan password disesuaikan}
mysql_select_db("user");
$umur = $_GET['u'];
$query = mysql_query("select umur from tabeluser where umur='$umur'");
if(mysql_num_rows($query)==0)
	{
		echo "";
	}
else
	{
		echo "Harus Diisi Angka";
	}
?>