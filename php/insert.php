<?php
$todo = $_POST['todo'];
$ref = $_POST['ref'];
$next = $_POST['next'];
echo $next;

//db接続
require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT
                            INTO
                        pomodoro (id, todo, ref, next, date)
                        VALUES(NULL, :todo, :ref, :next, now())"
                    );

$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);//PARAM_STRは文字列を指定
$stmt->bindValue(':ref', $ref, PDO::PARAM_STR);
$stmt->bindValue(':next', $next, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

// ４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  // ５．index.phpへリダイレクト
    header('Location:select.php');
}
?>