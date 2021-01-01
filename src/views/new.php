        <h1 class="shadow-sm mt-4">メモ帳</h1>
        <h2 class="mt-4">メモを登録</h2>
        <!-- action属性で送信先URLを指定 -->
        <!-- methodでどのようにデータを送信するか。本文で提供したデータを考慮したレスポンスの要求を、ブラウザーがサーバーに送信するためのメソッド -->
        <form action="create.php" method="POST">
            <?php if (count($errors)) : ?>
                <ul class="text-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="form-group">
                <!-- labelタグ：テキスト部分をクリックしてもチェックをつけることができるもの。 -->
                <label for="title">タイトル</label>
                <input class="form-control" type="text" name="title" id="title" value="<?php echo $memos['title']; ?>">
            </div>
            <div class="form-group">
                <label for="category">ジャンル</label>
                <input class="form-control" type="text" name="category" id="category" value="<?php echo $memos['category']; ?>">
            </div>
            <div class="form-group">
                <label for="content">内容</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php echo $memos['content']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">登録する</button>
        </form>
    </div>
</body>

</html>
