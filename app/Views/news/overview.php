<div class="row py-2 border-bottom">
    <div class="col-12">
        <a href="news/create" class="btn btn-success float-end">Create New Post</a>
    </div>
</div>
<div class="row m-0">
    <div class="col-12">

        <?php if (!empty($succMsg)) : ?>
            <h2 class="bg success text-white"><?= esc($succMsg) ?></h2>
        <?php endif ?>

        <h2 class="border-bottom border-4"><?= esc($title) ?></h2>
        <?php if (!empty($news) && is_array($news)) : ?>

            <?php foreach ($news as $news_item) : ?>

                <h3><?= esc($news_item['title']) ?></h3>

                <div class="main">
                    <?= esc($news_item['body']) ?>
                </div>
                <p>
                    <a href="/news/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-success">View</a>
                    <a href="/news/edit/<?= esc($news_item['id'], 'url') ?>" class="btn btn-primary">Edit</a>
                    <a href="/news/delete/<?= esc($news_item['id'], 'url') ?>" class="btn btn-danger" onClick="return confirm('Do you really want to delete this news ?');">Delete</a>
                </p>
            <?php endforeach ?>

        <?php else : ?>

            <h3>No News</h3>

            <p>Unable to find any news for you.</p>

        <?php endif ?>
    </div>
</div>