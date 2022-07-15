<?php 
global $pdo;
$login = filter_var(trim($_POST['auth_login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['auth_pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass."forhktkntuhpi"); // Создаем хэш из пароля

$result = $pdo->query("SELECT * FROM auth WHERE auth_login = '$login' AND auth_pass = '$pass'");
$user = $result->fetch(PDO::FETCH_ASSOC); // Конвертируем в массив
if(count($user) == 0){
	echo "Такой пользователь не найден.";
	exit();
}
else if(count($user) == 1){
	echo "Логин или пароль введены неверно";
	exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header('Location: page.html');

 ?>