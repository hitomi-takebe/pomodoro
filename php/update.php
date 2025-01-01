
<?php
//1. POSTデータ取得
$todo   = $_POST['todo'];
$ref  = $_POST['ref'];
$next    = $_POST['next'];
$id    = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE
                            pomodoro
                        SET
                            todo = :todo,
                            ref = :ref,
                            next = :next,
                            -- content = :content,
                            date = sysdate()
                        WHERE
                            id = :id;
                        ');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':ref', $ref, PDO::PARAM_STR);
$stmt->bindValue(':next', $next, PDO::PARAM_STR); //PARAM_INTなので注意
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}
?>