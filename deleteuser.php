 <?
 session_start();
 $log=$_SESSION['log'];
 $db=new MongoClient();
 $users=$db->notes->users;
 $cursor = $users->find();
 foreach ($cursor as $obj) {
  	if ($obj['username']==$log){
  		$users->remove($obj);
  	}
  
 }
 $_SESSION["log"] = null;
echo "<script>
window.location='index.php';
</script>";
 ?>