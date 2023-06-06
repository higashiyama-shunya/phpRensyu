<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <title>php Test</title>
</head>

<body>
    <?php
    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }
    try {
        $dsn = 'mysql:dbname=mydb;port=3306;charset=utf8mb4;host=mysql';
        $user = 'root';
        $pass = 'root';

        $dbh = new PDO($dsn, $user, $pass);

        $sql = "SELECT * FROM post";
        $stmh = $dbh->prepare($sql);
        $stmh->execute();
    } catch (PDOException $e) {
        die('接続エラー：' . $Exception->getMessage());
    }
    $datetime = date('Y/m/d H:i');
    ?>
    <h1>オイスター掲示板</h1>

    <?php
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <p><?= h($row['datetime']) ?> <?= h($row['name']) ?> <?= h($row['post']) ?></p>
    <?php
    }
    $pdo = null;
    ?>




    <form name="test_form" action="post.php" method="post">
        <input type="hidden" name="date" value="<?php echo "$datetime" ?>">
        <p>名前：<input type="text" name="name"></p>
        <p>コメント：</p>
        <p><textarea cols="80" rows="10" name="comment"></textarea></p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>