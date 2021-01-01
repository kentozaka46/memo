    <h1 class="shadow-sm mt-4 mb-4">メモ一覧</h1>
    <a href="new.php" class="btn btn-primary mb-4">メモを登録する</a>
    <main>
        <!-- メモが登録されていれば -->
        <?php if(count($memoes) > 0) : ?>
        <?php foreach ($memoes as $memos) : ?>
            <section class="card shadow-sm mb-4">
                <div class="card-body">
                    <div>
                        <h2 class="card-title">
                            タイトル：<?php echo escape($memos['title']); ?>
                        </h2>
                    </div>
                    <div>
                        <h3 class="h4">
                            日付：<?php echo date('Y/m/d'); ?>
                        </h3>
                    </div>
                    <div>
                        <h2 class="card-subtitle">
                            ジャンル：<?php echo escape($memos['category']); ?>
                        </h2>
                    </div>
                    <div>
                        <h2 class="card-text">
                            <!-- 改行を反映させる実装コード -->
                            内容：<?php echo nl2br(escape($memos['content'])); ?>
                        </h2>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
        <!-- メモが何もない時の処理 -->
        <?php else : ?>
            <p>メモが登録されていません。</p>
        <?php endif; ?>
    </main>
    </body>

    </html>
