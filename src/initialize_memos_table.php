<?php

// 接続→テーブルがあれば削除→テーブルを作る→切断
// 外部のファイルを読み込む。それぞれのライブラリをrequireしなくても良いものがautoload
require_once __DIR__ . '/lib/mysqli.php';


function dropTable($link)
{
    $dropTableSql = 'DROP TABLE IF EXISTS memos';
    $result = mysqli_query($link, $dropTableSql);

    if ($result) {
        echo 'テーブルを削除しました' . PHP_EOL;
    } else {
        echo 'Error: テーブルの削除に失敗しました' . PHP_EOL;
        echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;
    }
}

function createTable($link)
{
    $createTableSql = <<<EOT
CREATE TABLE memos (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    date DATE,
    category VARCHAR(100),
    content VARCHAR(65535)
) DEFAULT CHARACTER SET=utf8mb4;
EOT;
    $result = mysqli_query($link, $createTableSql);

    if ($result) {
        echo 'テーブルを作成しました' . PHP_EOL;
    } else {
        echo 'Error: テーブルの作成に失敗しました' . PHP_EOL;
        echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;
    }
}

$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
