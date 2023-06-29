<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <!-- insert.phpへ送る -->
    <!-- <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>Email：<input type="text" name="number"></label><br>
                <label><textArea name="content" rows="4" cols="40"></textArea></label><br> -->
                <!-- <input type="submit" value="送信" onclick="clickEvent()">
            </fieldset>
        </div>
    </form> -->
    <!-- Main[End] -->

<!-- ↓前回の課題を加工 -->

<h3>音声広告の放送媒体となる商業施設を登録・選択する</h3>
    <div class="form">
        <form action="insert.php" method="POST">

            <div class="name">
                <lavel for="name">施設名:</lavel>
                <input type="text" name="name" class="inputname">
            </div>
            <div class="number">
                <lavel for="number">来客人数/日:</lavel>
                <input type="number" name="number" placeholder="半角数字" class="inputnumber">
            </div>
            <div>
                <input type="submit" value="送信" id="submit" class="submit" onclick="clickEvent()">
            </div>
        </form>
    </div>



    <!-- ↓自分でつけてみた -->
    <script>
        function clickEvent(){
        alert('DBに登録されました')  
        }
    </script>


</body>

</html>
