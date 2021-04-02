<?php
// var_dump($_POST);
// exit();

//情報の取得
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$aspiration = $_POST['aspiration'];

//csvファイル作成
$ary = [$name,$email,$age,$gender,$aspiration];

$file = fopen('data/survey.csv','a');
flock($file,LOCK_EX);
fputcsv($file,$ary);


// $write_data = "{$name} {$age} {$email} {$gender} 

// fwrite($file,$write_data);
flock($file,LOCK_UN);
fclose($file);
header('Location:survey_csv_input.php');
?>
