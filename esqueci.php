<?php
include_once "config.php";

$email = $_POST['email'];

$result = mysql_query("SELECT 
	email
	FROM dados_usuario 
	WHERE email = '$email'");

$codigo =  md5(date('Y-m-d h:i:s')) . md5($email);
mysql_query("UPDATE dados_usuario SET codigo='$codigo' WHERE email = '$email'");

$contagem = mysql_num_rows($result); 

echo "http://localhost/gabriel/login/terca/redefine.php?email=$email&codigo=$codigo";
if ( $contagem == 1 ) {
	if(mail('gabrielfelixgomes1@gmail.com', 'Assunto', "http://localhost/gabriel/login/terca/redefine.php?email=$email&codigo=$codigo")){
		echo 'Email enviado com sucesso';
	}
}else{
	echo 'Email e/ou usuario nao existe';
}


