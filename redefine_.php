<?php
include_once "config.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$result = mysql_query("UPDATE senha SET senha = '$senha' WHERE id_usuario = (SELECT id_usuario FROM dados_usuario WHERE email='$email')");


if ( $result == 1 ) {
	unset($_SESSION['token_seguranca']);
	$_SESSION['email'] = $email;
	$_SESSION['senha'] = $senha;
	header("Location: ok.php");
}else{
	echo 'Ocorreu um erro';
	header("Location: login.php");
}

while($return = mysql_fetch_array($result)) {
	echo $return['nome'];
}

