<?php

// var_dump($_POST);
// exit();

// POSTデータ確認
if(
    !isset($_POST['place']) ||
    !isset($_POST['genre']) ||
    !isset($_POST['store']) ||
    !isset($_POST['score']) || 
    !isset($_POST['comment']) || 
    !isset($_POST['date']) || $_POST['date'] === ''
){
    exit('ParamError');
}

$place = $_POST['place'];
$genre = $_POST['genre'];
$store = $_POST['store'];
$score = $_POST['score'];
$comment = $_POST['comment'];
$date = $_POST['date'];


// 各種項目設定
$dbn ='mysql:dbname=gs_d14_03;charset=utf8mb4;port=3306;host=localhost';  //gs_d14_03はDB名
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// echo 'DB接続成功';
// exit();


// SQL作成&実行
$sql = 'INSERT INTO kadai (id, place, genre, store, score, comment, date) VALUES(NULL, :place, :genre, :store, :score, :comment, :date)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':store', $store, PDO::PARAM_STR);
$stmt->bindValue(':score', $score, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);

// // SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }
  
  header('Location:lunch_input.php');
  exit();