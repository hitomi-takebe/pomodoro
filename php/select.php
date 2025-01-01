<?php
//1.データ登録
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM pomodoro;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';
        $view .= '<td>';
        $view .= '<a href="detail.php?id=' . $result['id'] .  '">' . $result['id'] . '</a>';
        $view .= '</td>';
        $view .= '<td> ' . $result['date'] . '</td><td>' . $result['todo'] . '</td><td>' . $result['ref'] . '</td><td>' . $result['next'] . '</td>';
        $view .= '<td>';
        $view .= '<a href="delete.php?id=' . $result['id'] .  '">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</td>';
        $view .= '</tr>';
    }
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .submit {
            max-width: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>

<header>
    <a class="submit" href="../index.php">戻る</a>
</header>

<body>
    <!-- Head[Start] -->

    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <!-- テーブルのヘッダーを表示 -->
            <table border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>登録日</th>
                        <th>①todo</th>
                        <th>②振り返り</th>
                        <th>③次からはこうしたい</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $view ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>