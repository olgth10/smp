<html>
<head>
    <meta charset="utf-8">
    <title>Easy.Notes</title>

    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }

            .form-signin .form-signin-heading, .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin input[type="text"], .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>
<body style="background-color:lavender">
    <div class="container">
        <form class="form-signin" action="">
            <h2 class="form-signin-heading">Вход:</h2>
            <input type="text" class="input-block-level" placeholder="Логин" name="log" required>
            <input type="password" class="input-block-level" placeholder="Пароль" name="pass" required>
            <button class="btn btn-large btn-primary" type="submit" name="type" value="Вход" autofocus>Вход</button>
            <button class="btn btn-large btn-primary" type="submit" name="type" value="Регистрация">Регистрация</button>
        </form>
    </div>
		
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