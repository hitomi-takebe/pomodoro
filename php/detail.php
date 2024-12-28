<?php

$id = $_GET['id'];
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM pomodoro where id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}

//jQueryでいうconsole.logで動作確認をしよう！！
// var_dump($result)

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label>todo：<input type="text" name="todo" value="<?= $result['todo'] ?>"></label><br>
                <label>振り返り：<input type="text" name="ref" value="<?= $result['ref'] ?>"></label><br>
                <label>次回：<input type="text" name="next" value="<?= $result['next'] ?>"></label><br>
                <!-- <label><textarea name="content" rows="4" cols="40"><?= $result['name'] ?></textarea></label><br> -->
                <input type="hidden" name="id" value="<?= $result['id'] ?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>