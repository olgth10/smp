<html>
<head>
    <title>Easy.Notes</title>
    <meta charset="utf-8" />
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body style="background-color:lavender">
	<form action="leave.php">
		<div align="right"><input type="submit" value="Выход" class="btn-primary"/></div>
	</form>
	<form action="deleteuser.php">
		<div align="right"><input type="submit" value="Удалить аккаунт" class="btn-primary" /></div>
	</form>
<div align="center" style="font-size:32px;">Заметка:</div><br />
	<form action="add.php">
    <div align="center" style="font-size:20px;">Заголовок:</div><br />
        <div align="center"><input type="text" name="title" id="title" style="height:30px;width:300px" required/></div><br />
    <div align="center" style="font-size:20px;">Текст:</div><br />
        <div align="center"><textarea style="height:150px;width:500px" name="text" id="text" required ></textarea></div><br />
        <div align="center"><input type="submit" value="Добавить заметку" class="btn btn-large btn-primary"/></div><br /><br /><br />
  </form>
<div align="center" style="font-size:32px">Заметки пользователя:</div>
    <?
    session_start();
    //
$db=new MongoClient();
$users=$db->notes->users;
$notes=$db->notes->notes;
$log=$_SESSION['log'];
$cursor = $notes->find();
$text=$_GET['text'];
$title=$_GET['title'];
echo '
<script>
document.getElementById("title").value="'.$title.'";
document.getElementById("text").value="'.$text.'";
</script>
';
  foreach ($cursor as $obj) {
  	if ($obj['acc']==$log){
		echo '<hr>';
  		echo '<div align="center" style="font-size:24px">Заголовок:'.$obj['title'].'</div><br />';
  		echo '<div align="center" style="font-size:20px">Текст:'.$obj['text'].'</div><br />';
      echo '<div align="center"><a href="changenote.php?title='.$obj['title'].'&text='.$obj['text'].'">Изменить заметку</a></div>';
  		echo '<div align="center"><a href="deletenote.php?title='.$obj['title'].'&text='.$obj['text'].'">Удалить заметку</a></div>';
  		echo '<br/>';
  	}
  
 }

    ?>
</body>
</html>