<h3><?= $params['user']->Username ?></h3>
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
    	<img src="<?= $params['user']->Image ?>" class="card-img-top" alt="..." style="width: 18rem">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $params['user']->Firstname ?> <?= $params['user']->Lastname ?></h5>
        <div class="card-text">
        	<ul class="list-group list-group-flush">
        		<li class="list-group-item">Email: <?= $params['user']->Email ?></li>
        		<li class="list-group-item">Birthdate: <?= $params['user']->Birthdate ?></li>
        		<li class="list-group-item"><?= $params['user']->Description ?></li>
        </div>
        <?php if(array_key_exists('logedin', $request->session)): ?>
          <a class="btn btn-primary" href="/profile/edit?id=<?= $params['user']->id ?>">Edit</a>
        <?php endif; ?>
    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">German</th>
      <th scope="col">English</th>
      <th scope="col">Tries</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach($params['attempts'] as $attempt): ?>
		<?php $QuizPart = QuizPart::find(array('id' => $attempt->id))[0];?>
		<tr>
			<td><?= $attempt->id ?></td>
			<td><?= $QuizPart->German ?></td>
			<td><?= $Quizpart->English ?></td>
			<td><?= $attempt->Successful ?></td>
		</tr>
	<?php endforeach; ?>
  </tbody>
</table>