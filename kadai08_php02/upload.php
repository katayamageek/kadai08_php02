\<?php
// データベースの接続情報
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "music_db";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続チェック
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ファイルがアップロードされた場合
if(isset($_POST['submit']) && $_FILES['audioFile']){
  $errors= array();
  $file_name = $_FILES['audioFile']['name'];
  $file_size =$_FILES['audioFile']['size'];
  $file_tmp =$_FILES['audioFile']['tmp_name'];
  $file_type=$_FILES['audioFile']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['audioFile']['name'])));
  
  // ファイル形式のチェック
  $extensions= array("mp3","wav");
  
  if(in_array($file_ext,$extensions) === false){
     $errors[]="extension not allowed, please choose a .mp3 or .wav file.";
  }
  
  // エラーがなければファイルをアップロード
  if(empty($errors)==true){
     // ファイルを 'uploads' フォルダに移動
     move_uploaded_file($file_tmp,"uploads/".$file_name);
     
     // データベースにメタデータを保存
     $sql = "INSERT INTO tracks (name, path) VALUES ('$file_name', 'uploads/$file_name')";
     if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
  }else{
     print_r($errors);
  }
}
$conn->close();
?>
