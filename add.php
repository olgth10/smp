<?
session_start();
$db=new MongoClient();
$users=$db->notes->users;
$notes=$db->notes->notes;
$log=$_SESSION['log'];
$title=$_GET['title'];
$text=$_GET['text'];
$note = array( "acc" => $log, "title"=>$title, "text" => $text); 
$notes->insert($note);
echo "
<script>
window.location='notes.php';
</script>
";
?>