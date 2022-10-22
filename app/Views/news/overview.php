<div class="row m-0">
    <div class="col-12">

        <h2 class="border-bottom border-4"><?= esc($title) ?></h2>
        <?php if (!empty($news) && is_array($news)) : ?>

            <?php foreach ($news as $news_item) : ?>

                <h3><?= esc($news_item['title']) ?></h3>

                <div class="main">
                    <?= esc($news_item['body']) ?>
                </div>
                <p><a href="/news/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-success">View article</a></p>

            <?php endforeach ?>

        <?php else : ?>

            <h3>No News</h3>

            <p>Unable to find any news for you.</p>

        <?php endif ?>
    </div>
</div>