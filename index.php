<?php 

define('WWW_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once 'autoload.php';

use model\User;

$users = new User();
$users = $users->findAll();
if(isset($_GET['delete'])){
	$id = (int) $_GET['delete'];
	$remove = new User();
	$remove->remove($id);
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
	echo "removido com sucesso";
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Lista Usuarios</h2>
<a href="form.php" title="">Cadastrar novo</a>
<table>
	
	<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>email</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?= $user->id ?></td>
			<td><?= $user->name ?></td>
			<td><?= $user->email ?></td>
			<td><a href="form.php?id=<?= $user->id ?>" title="">Editar</a></td>
			<td><a href="?delete=<?= $user->id ?>" title="">Remover</a></td>
		</tr>
	<?php endforeach; ?>	
	</tbody>
</table>


</body>
</html>