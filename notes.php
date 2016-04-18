<html>
<head>
    <title>Easy.Notes</title>
    <meta charset="utf-8" />
<style>
        .great_btn {
 background: linear-gradient(to bottom, #0bc408 0%,#09a206 100%);
 color: #fff;
 font-size: 16px;
 text-shadow: 0 1px 0 #757575;
 padding: 4px 0 5px 0;
 margin: 0;
 cursor: pointer;
 border: 0;
 border-top: 1px solid #87c286;
 border-right: 1px solid #0e780c;
 border-left: 1px solid #0e780c;
 border-bottom: 1px solid #0e780c;
 box-shadow: 0 -1px 0 #0e780c, 0 1px 0 #fff;
 width: 150px;
 border-radius: 2px;
}
    </style>
</head>
<body style="background-color:lavender">
	<form action="leave.php">
		<div align="right"><input type="submit" value="Выход" /></div>
	</form>
	<form action="deleteuser.php">
		<div align="right"><input type="submit" value="Удалить аккаунт" /></div>
	</form>
<div align="center" style="font-size:32px;">Заметка:</div><br />
	<form action="add.php">
<div align="center" style="font-size:20px;">Заголовок:</div><br />
        <div align="center"><input type="text" name="title" style="height:30px;width:300px"/></div><br />
    <div align="center" style="font-size:20px;">Заметка:</div><br />
        <div align="center"><textarea style="height:150px;width:500px" name="text" ></textarea></div><br />
        <div align="center"><input type="submit" value="Добавить заметку" class="great_btn"/></div><br /><br /><br />
    </form>
<div align="center" style="font-size:32px">Заметки пользователя:</div>
    <?
    session_start();
$db=new MongoClient();
$users=$db->notes->users;
$notes=$db->notes->notes;
$log=$_SESSION['log'];
$cursor = $notes->find();
  foreach ($cursor as $obj) {
  	if ($obj['acc']==$log){
		echo '<hr>';
  		echo '<div align="center" style="font-size:24px">Заголовок:'.$obj['title'].'</div><br />';
  		echo '<div align="center" style="font-size:20px">Текст:'.$obj['text'].'</div><br />';
  		echo '<form action="deletenote.php"><a href="deletenote.php?title='.$obj['title'].'&text='.$obj['text'].'">delete</button></form>';
  		echo '<br/>';
  	}
  
 }

    ?>
</body>
</html>