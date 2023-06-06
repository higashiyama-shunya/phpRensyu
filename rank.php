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
    $users = [];

    $num = $stmh->fetchAll(PDO::FETCH_ASSOC);
    foreach ($num as $row) {
        $user = ['name' => $row['name'], 'time' => $row['post']];
        $users[] = $user;
    }

    $results = [
        "message" => "正常にデータが取得できました。",
        "results" => $users,
        "status" => 200
    ];

    /*
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
        $user = ['name' => $row['name'], 'time' => $row['post']];
        $users[] = $user;
    }

    $results = [
        "results" => $users,
    ];



    /*
    $users = [];    //空の配列を作成する。
    for ($i = 0; $i <= 10; $i++) {
        $user = ["name" => "user", "time" => "2:50"];   //これがJSONファイルの中身
        $users[] = $user;   //for文で空の配列に入れていく
    }
    $results = [
        "results" => $users,    //resultsという名前の配列の中にfor文で回した入れたusersを入れる。
    ];

    /* 変数の使い方を間違えたり、配列が変なことになっていた文
    $dsn = 'mysql:dbname=mydb;port=3306;charset=utf8mb4;host=mysql';
    $user = 'root';
    $pass = 'root';

    $dbh = new PDO($dsn, $user, $pass);

    $sql = "SELECT * FROM post";
    $stmh = $dbh->prepare($sql);
    $stmh->execute();
    $users = "";
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
        $user = array(
            'name' => 
            'time' => 
        );
    }

    
    $results = array(
        "results" => array( ここを配列でつつんでいたため、二次元配列になっていた。           
        )
    );
    /*
    /*
    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
        $results = array(
            "results" => array(
                ['name' => $row['name'], 'time' => $row['post']],
            )
        );
        array_push($userDatabase, $results);
    }*/

    //jsonとして出力e
    header('Content-type: application/json');
    $date_json = json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo $date_json;
} catch (PDOException $e) {
    die('接続エラー：' . $Exception->getMessage());
}
