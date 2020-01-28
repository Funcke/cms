<div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
  <?php foreach($params['quizzes'] as $quiz): ?>
  <li class="list-group-item"><a href="/vocab/show?id=<?= $quiz->id ?>"><?= $quiz->Title ?></a></li>
<?php endforeach; ?>
  </ul>
</div>