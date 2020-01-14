<link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet">
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
        		<li class="list-group-item"><a style="color: #000" target="_blank" href="https://github.com/funcke"><i class="fab fa-github"></i></a>
    					<a style="color: #000" target="_blank" href="https://www.linkedin.com/in/jonas-funcke"><i class="fab fa-linkedin"></i></a>
    					<a style="color: #000" target="_bank" href="https://dev.funcke.work"><i class="far fa-address-card"></i></a>
    					<a style="color: #000" target="_blank" href="https://twitter.com/funcke_"><i class="fab fa-twitter"></i></a>
    					<a style="color: #000" target="_blank" href="https://dev.to/funcke"><i class="fab fa-dev" ></i></a>
    					<a style="color: #000" target="_blank" href="https://stackoverflow.com/users/10971577/jonas-funcke"><i class="fab fa-stack-overflow"></i></a>
    					<a style="color: #000" target="_blank" href="https://medium.com/@funckejonas"><i class="fab fa-medium"></i></a>
    				</li>
    		   </ul>
        </div>
        <?php if(array_key_exists('logedin', $request->session)): ?>
          <a class="btn btn-primary" href="/profile/edit?id=2">Edit</a>
        <?php endif; ?>
    </div>
  </div>
</div>