<?php 
global $pdo;
if($_GET['action'] == "out") out(); //если передана переменная action, «разавторизируем» пользователя

if (login()) //вызываем функцию login, которая определяет, авторизирован пользователь или нет

{
    $UID = $_SESSION['id']; //если пользователь авторизирован, присваиваем переменной $UID его id
    $admin = is_admin($UID); //определяем, админ ли пользователь

}
else //если пользователь не авторизирован, проверяем, была ли нажата кнопка входа на сайт
{
    if(isset($_POST['log_in'])) 
    {
        $error = enter(); //функция входа на сайт

        if (count($error) == 0) //если ошибки отсутствуют, авторизируем пользователя
        {
            $UID = $_SESSION['id'];

            $admin = is_admin($UID);
        }
    }
}

function lastAct($id)
{   $tm = time();   $pdo->query("UPDATE auth SET online='$tm', last_act='$tm' WHERE id='$id'"); }

function login () {     
    ini_set ("session.use_trans_sid", true);    session_start();    if (isset($_SESSION['id']))//если сесcия есть   
    
    {       
    if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если cookie есть, обновляется время их жизни и возвращается true      {           
    SetCookie("login", "", time() - 1, '/');            SetCookie("password","", time() - 1, '/');          
    
    setcookie ("login", $_COOKIE['login'], time() + 50000, '/');            
    
    setcookie ("password", $_COOKIE['password'], time() + 50000, '/');          
    
    $id = $_SESSION['id'];          
    lastAct($id);           
    return true;        
    
    }       
    else //иначе добавляются cookie с логином и паролем, чтобы после перезапуска браузера сессия не слетала         
    {           
    foreach($pdo->query("SELECT * FROM auth WHERE id='{$_SESSION['id']}'")as $row){
        setcookie ("login", $row['login'], time()+50000, '/');              
    
        setcookie ("password", md5($row['login'].$row['password']), time() + 50000, '/'); 
        
        $id = $_SESSION['id'];
        lastAct($id); 
        return true;                
    }; //запрашивается строка с искомым id             
    

    } 
    else return false;      
    }    
    else //если сессии нет, проверяется существование cookie. Если они существуют, проверяется их валидность по базе данных     
    {       
    if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если куки существуют      
    
    {           
    $rez = mysql_query("SELECT * FROM users WHERE login='{$_COOKIE['login']}'"); //запрашивается строка с искомым логином и паролем             
    @$row = mysql_fetch_assoc($rez);            
    
    if(@mysql_num_rows($rez) == 1 && md5($row['login'].$row['password']) == $_COOKIE['password']) //если логин и пароль нашлись в базе данных           
    
    {               
    $_SESSION['id'] = $row['id']; //записываем в сесиию id              
    $id = $_SESSION['id'];              
    
    lastAct($id);               
    return true;            
    }           
    else //если данные из cookie не подошли, эти куки удаляются             
    {               
    SetCookie("login", "", time() - 360000, '/');               
    
    SetCookie("password", "", time() - 360000, '/');                    
    return false;           
    
    }       
    }       
    else //если куки не существуют      
    {           
    return false;       
    }   
    } 
?>