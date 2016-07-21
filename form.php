<?php 

define('WWW_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once 'autoload.php';

use model\User;

$user = new User();
if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$user = $user->find($id);

}elseif (isset($_GET['atualizar'])) {
	$user->setName(strip_tags($_POST['name']));
	$user->setEmail(strip_tags($_POST['email']));
	$id = (int) $_GET['atualizar'];
	$user->update($id);
	echo "atualizado com sucesso";
}elseif(isset($_GET['cadastrar'])){
	$user->setName(strip_tags($_POST['name']));
	$user->setEmail(strip_tags($_POST['email']));
	$user->insert();
	echo "Cadastrado com sucesso";
}else{

	
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
	<a href="index.php" title="">Listar</a>
	<br>
	<form action="<?php if(isset($_GET['id'])){ echo "form.php?atualizar=".$user->id; }else{ echo "form.php?cadastrar"; } ?>" method="POST" accept-charset="utf-8">
		<label>Nome:<input type="text" name="name" placeholder="nome..." value="<?php if(isset($_GET['id'])){ echo $user->name; } ?>"></label>
		<label>Email:<input type="text" name="email" placeholder="email..." value="<?php if(isset($_GET['id'])){ echo $user->email; } ?>"><label>
		<input type="submit" value="Cadastrar" >
	</form>
</body>
</html>