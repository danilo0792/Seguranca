<?php
include_once "config.php";

$email = $_POST['email'];

$result = mysql_query("SELECT 
	email
	FROM dados_usuario 
	WHERE email = '$email'");

$codigo =  md5(date('Y-m-d h:i:s')) . md5($email);
$_SESSION['token_seguranca'] = $codigo;

$contagem = mysql_num_rows($result); 

echo "http://localhost/segurancaaa/redefine.php?email=$email";
if ( $contagem == 1 ) {
	if(mail('gabrielfelixgomes1@gmail.com', 'Assunto', "http://localhost/segurancaaa/redefine.php?email=$email")){
		echo 'Email enviado com sucesso';
	}
}else{
	echo 'Email e/ou usuario nao existe';
}


