<div class="container padding mt-5">
    <div class="card mb-3">
      <div class="card-header">
        All Quizzes
      </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <?php foreach($params['quizzes'] as $quiz): ?>
            <li class="list-group-item"><a href="/vocab/show?id=<?= $quiz->id ?>"><?= $quiz->Title ?></a></li>
            <?php endforeach; ?>
          </ul>
          <br/>
          <a href="/vocab/new" class="btn btn-primary form-control">Create Quiz</a>
        </div>
    </div>   
</div>