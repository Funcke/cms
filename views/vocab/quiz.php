<div class="container padding mt-5">
    <div class="card mb-3">
        <div class="card-body text-center">
            <a href="/vocab/train?id=<?= $params['quiz']['metadata']->id ?>&format=en">Egnlish</a>
            | <a href="/vocab/train?id=<?= $params['quiz']['metadata']->id ?>&format=de">German</a>
            <hr class="light">
            <form method="POST" action="vocab/train">
                <input type="hidden" name="mode" value="<?= $params['format'] ?>"/>
                <input type="hidden" name="id" value="<?= $params['quiz']['metadata']->id ?>" />
                <?php include('views/vocab/languages/_'.$params['format'].'.php'); ?>
                <hr class="light">
                <input type="submit" class="btn btn-primary" value="check"/>
            </form>
        </div>
    </div>
</div>