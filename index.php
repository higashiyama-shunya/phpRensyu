<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Test</title>
</head>

<body>
    <h1>オイスター掲示板</h1>
    <?php
    date_default_timezone_set('Asia/Tokyo');
    function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = $_POST['date'];
    $filename = "memo.txt";
    $datetime = date('Y/m/d H:i');

    if (isset($comment)) {
        $fp = fopen($filename, 'a');
        fputs($fp, $date . "  ");
        fputs($fp, $name . "  ");
        fputs($fp, $comment . PHP_EOL);
        fclose($fp);
    }


    $files = file($filename);

    foreach ($files as $value) {
        echo '<p>' . h($value) . '</p>';
    }

    ?>
    <form name="test_form" action="index.php" method="post">
        <input type="hidden" name="date" value="<? echo "$datetime" ?>">
        <p>名前：<input type="text" name="name"></p>
        <p>コメント：</p>
        <p><textarea cols="80" rows="10" name="comment"></textarea></p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>