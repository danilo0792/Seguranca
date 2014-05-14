<?php
include_once "config.php";

$codigo = @$_SESSION['token_seguranca'];
$email = @$_GET['email'];

$result = mysql_query("SELECT * FROM dados_usuario WHERE email = '$email'");
$contagem = mysql_num_rows($result); 

if ( $contagem == 1 ) {
	if(isset($_SESSION['token_seguranca'])){
?>
<form name="cadastrar.php" method="post" action="redefine_.php">
  <table width="400" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Email:</font></td>
      <td width="250"><input name="email" type="text" id="email" value="<?php echo $email; ?>" maxlength="120"></td>
    </tr>
    <tr> 
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nova Senha:</font></td>
      <td><input name="senha" type="password" id="senha" maxlength="50"></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
          <input name="enviar" type="submit" id="enviar" value="Enviar">
        </div></td>
    </tr>
  </table>
</form>

<?php
	}else{
		header("Location: login.php");
	}
}else{
	echo 'Voce eh um criminoso ! iremos te denunicar ao FBI, se prepare.';
}


