<?php foreach($params['quizzes'] as $quiz): ?>
<a href="/vocab/show?id=<?= $quiz->id ?>"><?= $quiz->Name ?></a>
<?php endforeach; ?>