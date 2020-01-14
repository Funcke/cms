<ul class="list-group">
	<?php foreach($params['users'] as $user): ?>
	  <li class="list-group-item d-flex justify-content-between align-items-center">
	    <a href="/blog/profile?id=<?= $user->id ?>"><?= $user->Username; ?></a>
	  </li>
  <?php endforeach; ?>
</ul>