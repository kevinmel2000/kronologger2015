﻿<?php
/*
databse : kronolog_macet
password : G;hmK,NmvJT-
kronolog_kron2015
Added user “kronolog_umacet” with password “dibikingampang1234”.
z=sOS@bWTZ(e
z=sOS@bWTZ(e
User: kronolog_u2015
Database: kronolog_kron2015
*/
$mySQLserver = "localhost";
$mySQLuser = "kronolog_u2015";
$mySQLpassword = "z=sOS@bWTZ(e";
$mySQLdefaultdb = "kronolog_kron2015";
$host = "kronologger.com";


$mySQLserver = "localhost";

$mySQLuser = "root";

$mySQLpassword = "";

$mySQLdefaultdb = "kronologger2015";

$host = "localhost/kronologger2015";


$link = mysql_connect($mySQLserver, $mySQLuser, $mySQLpassword) or die ("Could not connect to MySQL");
mysql_select_db ($mySQLdefaultdb) or die ("Could not select database");
?>