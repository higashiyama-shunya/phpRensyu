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

    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO post (name,post) VALUES (:name,:comment)";
    $stmt = $dbh->prepare($sql);
    $params = array(':name' => h($name), ':comment' => h($comment));
    $stmt->execute($params);
} catch (PDOException $e) {
    die('接続エラー：' . $Exception->getMessage());
}
header('Location:index.php');
exit;
