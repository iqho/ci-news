<div class="row py-2 border-bottom">
    <div class="col-12">
        <a href="/news" class="btn btn-success float-end">Home</a>
    </div>
</div>
<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/news/create" method="post" class="m-4">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" class="form-control w-50" value="<?= old('title') ?>" /><br />

    <label for="body">Text</label>
    <textarea name="body" cols="45" class="form-control w-50" rows="4"><?= old('body') ?></textarea><br />

    <input type="submit" name="submit" value="Create news item" class="btn btn-success" /><br>
</form>