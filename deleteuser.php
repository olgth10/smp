 <?
 session_start();
 $log=$_SESSION['log'];
 $db=new MongoClient();
 $users=$db->notes->users;
 $notes=$db->notes->notes;
 $cursor = $users->find();
 foreach ($cursor as $obj) {
  	if ($obj['username']==$log){
  		$users->remove($obj);
  	}
  
 }
$cursor1 = $notes->find();
foreach ($cursor1 as $obj) {
  	if ($obj['acc']==$log){
  		$notes->remove($obj);
  	}
  
 }
 $_SESSION["log"] = null;
echo "<script>
window.location='index.php';
</script>";
 ?>