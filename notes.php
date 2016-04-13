<html>
<head>
    <title>Easy.Notes</title>
    <meta charset="utf-8" />
</head>
<body>
	<form action="leave.php">
		<div><input type="submit" value="Выход"/ ></div>
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
$note = array( "acc" => $log); 
echo $cursor = $notes->find($note);

    ?>
</body>
</html>