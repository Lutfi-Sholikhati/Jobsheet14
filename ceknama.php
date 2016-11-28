<?php
mysql_connect("localhost","root",""); // {user dan password disesuaikan}
mysql_select_db("data");
$nama = $_GET['l'];
$query = mysql_query("select nama_lengkap from tabeluser where nama_lengkap='$nama'");
if(mysql_num_rows($query)==0)
	{
		echo "";
	}
else
	{
		echo "Nama Lengkap Harus Diisi";
	}
?>