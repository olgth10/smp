<html>
<head>
    <title>Easy.Notes</title>
    <meta charset="utf-8" />
</head>
<body>
	<form action="leave.php">
		<div><input type="submit" value="Выход"/ ></div>
	</form>
	<form action="deleteuser.php">
		<div><input type="submit" value="Удалить аккаунт"/ ></div>
	</form>
	<form action="add.php">
		<div align="center"><input type="text" name="title"/></br></div>
        <div align="center"><textarea style="align-self:center" name="text"></textarea></div>
        <div align="center"><input type="submit" value="Добавить заметку" /></div>
    </form>
    <?
    session_start();
$db=new MongoClient();
$users=$db->notes->users;
$notes=$db->notes->notes;
$log=$_SESSION['log'];
$cursor = $notes->find();
  foreach ($cursor as $obj) {
  	if ($obj['acc']==$log){
  		echo 'Title: ' . $obj['title'] . '<br/>';
  		echo 'Text: ' . $obj['text'] . '<br/>';
  		echo '<form action="deltenote.php"><a href="deletenote.php?title='.$obj['title'].'&text='.$obj['text'].'">delete</a></form>';
  		echo '<br/>';
  	}
  
 }

    ?>
</body>
</html>