<!-- 前半にphp処理、その処理の表示を後半のhtmlで行う -->

<!--  -->
<?php
// funcs.phpを読み込む（下記の１行を書くと、このファイルのページで使えるようになる）
require_once('funcs.php');


//1.  DB接続します　★insert.phpと全く同じなのでコピペでok
try {
  //Password:MAMP='root',XAMPP=''
  // $pdo = new PDO('mysql:dbname=****;charset=utf8;host=*****','****','*****');
  $pdo = new PDO('mysql:dbname=php02_kadai_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成　& 実行excute()
// $stmt = $pdo->prepare("*****");
$stmt = $pdo->prepare("SELECT * FROM php02_kadai_db");
$status = $stmt->execute();

//３．データ表示　上記で抜き出したデータをフロントに表示しよう！
$view="";
// 失敗したら↓　exitは処理を止めるメソッド
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
// うまくいったら↓
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= "**********";　←この授業ではpタグで囲って表示する方法をとる
    $view .= "<p>";
    $view .= h($result['name']) . ' : ' . h($result['number']) . ' | '  ; 
    // ↑ データは配列になっているのでこの書き方。文字列も可能。
    // htmlspecialchars($result['date'], ENT_QUOTES)　は()で囲むと、クロスサイト対策でスクリプトタグが実行されない
    $view .= "</p>";
  // ↑ ＝だと上書きされる。.=だと追記される
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
  <!-- ↓　$view を自分で入れる -->
      <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
