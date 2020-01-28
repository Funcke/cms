<a href="/vocab/train?id=<?= $params['quiz']['metadata']->id ?>&format=en">Egnlish</a>
<a href="/vocab/train?format=de">German</a>
<form method="POST" action="vocab/train">
    <input type="hidden" name="format" value="<?= $params['format'] ?>"/>
    <?php include('views/vocab/languages/_'.$params['format'].'.php'); ?>
</form>