<div class="row" style="height: 100%">
	<ul class="nav flex-column" style="height: 92vh">
	  <li class="nav-item">
	    <a class="nav-link active" href="/blog/admin?entity=user">Users</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="/blog/admin?entity=post">Posts</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="/blog/admin?entity=comment">Comments</a>
	  </li>
	</ul>
	<div class="col-8">
		<?php if($request->params['entity'] === 'user'): ?>
			<?php require('views/_all_users.php'); ?>
		<?php endif; ?>
	</div>
</div>