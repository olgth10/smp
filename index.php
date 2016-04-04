<?php
$m = new MongoClient(); //подключение к БД
$db = $m->notes; //выбор БД
$collection = $db->notes; //выбор коллекции
/*
$username="Oleg";
$pass="123qwe";
$note="Check";
$document = array( "username" => "username", "password" => $pass,"note"=>$note  ); 
$collection->insert($document);//добавление данных в коллекцию
*/
$content = $collection->findOne(array('username' => 'username')); 
var_dump($content); //вывод на экран найденых данных
?>