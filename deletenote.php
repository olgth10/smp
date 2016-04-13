<?session_start();
$db=new MongoClient();
$notes=$db->notes->notes;
$log=$_SESSION['log'];
$title=$_GET['title'];
$text=$_GET['text'];
$cursor = $notes->find();
foreach ($cursor as $obj) {
  	if ($obj['acc']==$log && $obj['title']==$title && $obj['text']==$text){
  		$notes->remove($obj);
  		break;

  	}
  
 }
 echo "
<script>
window.location='notes.php';
</script>
";
?>