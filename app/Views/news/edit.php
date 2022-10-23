<div class="row py-2 border-bottom">
    <div class="col-12">
        <a href="/news" class="btn btn-success float-end">Home</a>
    </div>
</div>
<h2><?= esc($title) ?></h2>

<?php if (!empty($succMsg)) : ?>
    <h2 class="bg success text-white"><?= esc($succMsg) ?></h2>
<?php endif ?>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/news/update" method="post" class="m-4">
    <?= csrf_field() ?>
    <input type="hidden" name="id" value="<?= $news['id'] ?>" /><br />

    <label for="title">Title</label>
    <input type="input" name="title" class="form-control w-50" value="<?= $news['title'] ?>" /><br />

    <label for="body">Text</label>
    <textarea name="body" cols="45" class="form-control w-50" rows="4"><?= $news['body'] ?></textarea><br />

    <input type="submit" name="submit" value="Update" class="btn btn-success" /><br>
</form>