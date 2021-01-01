<?php

require_once __DIR__ . '/lib/mysqli.php';

function createMemos($link, $memos)
{
    $sql = <<<EOT
INSERT INTO memos (
    title,
    date,
    category,
    content
) VALUES (
    "{$memos['title']}",
    "{$memos['date']}",
    "{$memos['category']}",
    "{$memos['content']}"
)
EOT;
    $result = mysqli_query($link, $sql);
    if (!$result) {
        error_log('Error: fail to create memo');
        error_log('Debugging Error:' . mysqli_error($link));
    }
}

function validate($memos)
{
    // バリデーションエラーした際にエラーを格納するための配列
    $errors = [];

    // タイトルが正しく入力されているかどうかのチェック
    if (strlen($memos['title']) > 100) {
        // 配列に値を格納
        $errors['title'] = 'タイトルは100文字以内で入力してください' . PHP_EOL;
    } elseif (!strlen($memos['title'])) {
        $errors['title'] = 'タイトルを入力してください';
    }

    // ジャンルが正しく入力されているかどうかのチェック
    if (strlen($memos['category']) > 100) {
        // 配列に値を格納
        $errors['category'] = 'ジャンルは100文字以内で入力してください' . PHP_EOL;
    } elseif (!strlen($memos['category'])) {
        $errors['category'] = 'ジャンルを入力してください';
    }

    // 内容が正しく入力されているかどうかのチェック
    if (strlen($memos['content']) > 1000) {
        // 配列に値を格納
        $errors['content'] = '内容は1000文字以内で入力してください' . PHP_EOL;
    } elseif (!strlen($memos['content'])) {
        $errors['content'] = '内容を入力してください';
    }

    // $errorsを戻り値として返す
    return $errors;
}

// ページにアクセスする際に使用されたリクエストのメソッド名がPOSTだったら
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POSTされたメモ情報を変数に格納する
    $memos = [
        'title' => $_POST['title'],
        'date' => date('Y/m/d'),
        'category' => $_POST['category'],
        'content' => $_POST['content']
    ];
    // バリデーションする
    $errors = validate($memos);
    // バリデーションエラーがなければ
    if (!count($errors)) {
        // データベースに接続する
        $link = dbConnect();
        // データベースにデータを登録する
        createMemos($link, $memos);
        // 接続を切断する
        mysqli_close($link);
        header("Location: index.php");
    }
    // もしエラーがあれば
}

include 'views/new.php';
