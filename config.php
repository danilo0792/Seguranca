<?php

$host		=	"localhost"; 
$database	=	"seguranca"; 
$login_db	=	"root"; 
$senha_db	=	""; 

mysql_connect($host, $login_db, $senha_db); 
mysql_select_db($database);

session_start();
