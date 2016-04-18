<?session_start();
$db=new MongoClient();
$notes=$db->notes->notes;
$log=$_SESSION['log'];
$title=$_GET['title'];
$text=$_GET['text'];
$cursor = $notes->find();
 echo "
<script>
window.location='notes.php?title=".$title."&text=".$text."';
</script>
";
foreach ($cursor as $obj) {
  	if ($obj['acc']==$log && $obj['title']==$title && $obj['text']==$text){
  		$notes->remove($obj);
  		break;

  	}
  
 }

?>