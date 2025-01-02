<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ポモドーロアプリ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="card">
        <span class="card__title">次の25分で何をする？</span>
        <div class="card__form">
            <form action="php/index_confirm.php" method="post">

                <label for="todo">①todo</label>
                <input type="text" class="todo" name="todo" placeholder="何をする予定？"><br>
                <label for="ref">②振り返り</label>
                <input type="text" class="ref" name="ref" placeholder="振り返り"><br>
                <label for="next">③次からはこうしたい</label>
                <input type="text" class="next" name="next" placeholder="次はこうする"><br>
                <input type="submit" class="submit" value="確認する">
                <p class="submit"><a href="php/select.php">一覧表示</a></p>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/timer.js"></script>

</body>

</html>