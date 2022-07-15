<?php 
//-----------------------------------------------------фукнции enter.php & login.php ------------------------------------------------------
function enter($login,$password){
	global $pdo;
	foreach ($pdo->query("SELECT * FROM auth WHERE login='$login'") as $row){
		if($row['login']==$login && $row['password']==md5($password))
		{
			$_COOKIE["sign_up"]=true;
			$_COOKIE["login"]=$login;
			return true;
		}
		else
		{
			$_COOKIE["sign_up"]=false;
			return false;
		}
	}
}
function login(){
	if (isset($_COOKIE["sign_up"])) {
		return $_COOKIE["sign_up"];
	}
	else return false;
}
function get_token($login,$password){
	global $pdo;
	$gen_token=md5($login.$password);
	$value_token=$pdo->query("UPDATE auth SET token='$gen_token' WHERE login='$login'");
	if(!$value_token)
	{
		exit();
	}
	setcookie("token", $gen_token, time()+36000, "/Diplom");
	header("Location: /Diplom/profile/lc.php");
}
function input_reg($inputLogin,$inputEmail,$inputName,$inputSurname,$inputPassword){
	if(!empty($inputLogin) && !empty($inputEmail) && !empty($inputName) && !empty($inputSurname) && !empty($inputPassword))
	{
		return true;
	}
	else{
		return false;
	}
}
function input_auth($inputLogin,$inputPassword){
	if(!empty($inputLogin) && !empty($inputPassword))
	{
		return true;
	}
	else{
		return false;
	}
}
function login_out(){
	if (isset($_COOKIE['token'])) {
	global $pdo;
	$pdo->query("UPDATE auth SET token='' WHERE token='".$_COOKIE['token']."'");
	setcookie("token", '', time()-36000, "/Diplom");
	header("Location: /Diplom/profile/enter.php");
	}
}
function login_on(){
	global $pdo;
	if(isset($_COOKIE['token']))
	{
		$value_user=$pdo->query("SELECT * FROM auth WHERE token='".$_COOKIE['token']."'")->fetch(PDO::FETCH_ASSOC);
		echo '
			<div class="login_flexbox">
			<a class="footer_info_company dan" href="/diplom/profile/lc.php">'.$value_user['login'].'</a>
			<form method="post">
				<input class="button_search" type="submit" name="exit" value="Выйти"></input>
			</form>
			</div>
		';
		if (isset($_POST['exit'])) {
			login_out();
		}
	}
	else{
		echo '
			<div class="login_flexbox">
			<a class="dan" href="/diplom/profile/enter.php">Авторизация</a>
            </div>
		';
	}
}
//-----------------------------------------------------фукнции index.php ------------------------------------------------------
function input_search($search_depart,$search_arrive,$search_date){
	if($search_depart != "Город вылета" || $search_arrive != "Город прилёта" || $search_date != "Дата вылета")
	{
		return true;
	}
	else{
		return false;
	}
}
?>