<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name = $_POST['name'];
$number = $_POST['number'];


//2. DB接続します　★select.phpと全く同じなのでコピペでok
try {
  //ID:'root', Password: xamppは 空白 ''
  // xamppの場合デフォルトでid(ユーザー名)はrootである
  // $pdo = new PDO('mysql:dbname=****;charset=utf8;host=*****','****','*****');
  $pdo = new PDO('mysql:dbname=php02_kadai_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意　※insert実行するための準備①
// $stmt = $pdo->prepare("*******************");
// この()内に該当のを入れる
$stmt = $pdo->prepare("INSERT INTO 
                        php02_kadai_table(id, name, number)
                        VALUES  (NULL, :name, :number
                        )");
// ここではVALUESに「:」がつくところがある。セキュリティ都合上のお作法である。

//  2. バインド変数を用意　※insert実行するための準備②
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

// $stmt->bindValue('******', *****, ****************);
// $stmt->bindValue('******', *****, ****************);
// $stmt->bindValue('******', *****, ****************);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':number', $number, PDO::PARAM_STR);


//  3. 実行excute()
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  // (登録が成功した場合の処理)
header('Location: index.php');
}
?>
