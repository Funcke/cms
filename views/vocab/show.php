<h2>Vocab Lection: <?= $params['quiz']['metadata']->Title ?></h2>
<ul>
    <? foreach($params['quiz']['content'] as $quiz): ?>
        <li><?= $quiz->English?> - <?= $quiz->German ?></li>
    <? endforeach; ?>
</ul>
<a href="/vocab/train?id=<?=$params['quiz']['metadata']->id ?>&format=en">Train now!</a>