<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>memo</title>
</head>

<body>
    <h1>オイスター掲示板</h1>
    <?php
    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, "UTF-8");
    }
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    if (isset($name) && isset($comment)) {
        echo "<p>" + h($name) + "のコメント</p>";
        echo "<p>" + h($comment) + "</p>";
    }
    ?>
    <form name="test_form" action="memo.php" method="post">
        <p>名前：<input type="text" name="name"></p>
        <p>コメント：</p>
        <p><textarea cols="80" rows="10" name="comment"></textarea></p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>