<html>
<head>
    <meta charset="utf-8" />
    <title>Easy.Notes</title>
</head>
<body style="background-color:lavender">
    <br>
    <p align="center" style="background-color:khaki;font-size:32px;font-family:'Comic Sans MS'">Заметки</p>
    <div align="center" style="font-size:20px">Логин:</div>
    <form action="">
        <div align="center"><input type="text" name="log" required autofocus /></div>
        <div align="center" style="font-size:20px">Пароль:</div>
        <div align="center"><input type="password" name="pass" required autofocus /></div><br />
        <div align="center"><input type="submit" value="Вход" name="type" style="font-size:16px"/></div><br />
        <div align="center" ><input type="submit" value="Регистрация" name="type" style="font-size:16px"/></div>
    </form>
		
        <?php
    session_start();
    if ($_SESSION['log']!=null){
        echo "
<script>
window.location='notes.php';
</script>
";
    }
    else
    {


$log=$_GET['log'];
$pass=$_GET['pass'];
$type=$_GET['type'];
$db=new MongoClient();
$users=$db->notes->users;
$user = array( "username" => $log, "password" => $pass); 
$content=$users->findOne($user);
if ($content==null and $type=="Вход"){
    echo '<script>
    alert("Неправильный логин или пароль!");
    window.location="index.php";
    </script>';
    return false;
    }
if ($content==null and $type=="Регистрация"){
    $users->insert($user);
    echo '<script>
    alert("Вы успешно зарегистрированы");
    </script>';
    return false;
    }
if ($content!=null and $type=="Регистрация"){
    echo '<script>
    alert("Такой логин уже используется!");
    </script>';
    return false;
    }
if ($content!=null and $type=="Вход"){
    echo '<script>
    alert("Вы успешно зашли!");
    window.location="notes.php";
    </script>'; 
        $_SESSION["log"] = $content["username"];
    return true;
}
}
?>
</body>
</html>