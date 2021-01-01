<?php

require_once __DIR__ . '/lib/mysqli.php';
require_once __DIR__ . '/lib/escape.php';

function listMemoes($link)
{
    $memoes = [];
    $sql = 'SELECT title, date, category, content FROM memos';
    $results = mysqli_query($link, $sql);

    while ($memos = mysqli_fetch_assoc($results)) {
        $memoes[] = $memos;
    }

    mysqli_free_result($results);

    return $memoes;
}

$link = dbConnect();
$memoes = listMemoes($link);

$title = 'メモ一覧';
$content = __DIR__ . '/views/index.php';

include 'views/layout.php';
