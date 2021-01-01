<?php

require __DIR__ . '/../vendor/autoload.php';

function dbConnect()
{
    // .envファイルを読み込む
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();

    // 環境変数を読み込む
    $dbHOST = $_ENV['DB_HOST'];
    $dbUsername = $_ENV['DB_USERNAME'];
    $dbPassword = $_ENV['DB_PASSWORD'];
    $dbDatabase = $_ENV['DB_DATABASE'];

    // データベースの情報を環境変数に置き換えている
    $link = mysqli_connect($dbHOST, $dbUsername, $dbPassword, $dbDatabase);

    // 接続できなかった時の処理
    if (!$link) {
        echo 'Error:データベースに接続できませんでした' . PHP_EOL;
        echo 'Debugging error:' . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $link;
}
