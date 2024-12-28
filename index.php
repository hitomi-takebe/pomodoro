<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="card">
        <span class="card__title">次の25分で何をする？</span>
        <div class="card__form">
            <form action="php/index_confirm.php" method="post">
                <p>時間とタイマー表示</p>
                <label for="todo">①todo</label>
                <input type="text" class="todo" name="todo" placeholder="何をする予定？"><br>
                <label for="ref">②振り返り</label>
                <input type="text" class="ref" name="ref" placeholder="振り返り"><br>
                <label for="next">③次からはこうしたい</label>
                <input type="text" class="next" name="next" placeholder="次はこうする"><br>
                <input type="submit" class="submit" value="確認する">
                <p>一覧表示</p>
                <?= $view ?>

                <p>フォーム形式で表示</p>
            </form>
        </div>
    </div>
</body>

</html>