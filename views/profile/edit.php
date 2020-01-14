<h3>Edit profile for <?= $params['user']->Username ?></h3>
<form action="/blog/profile/edit" method="POST">
	<input type="hidden" name="id" value="<?= $params['user']->id ?>" />
	<div class="form-group">
		<label for="username">Username: </label>
		<input class="form-control" type="text" name="username" value="<?= $params['user']->Username ?>"/>
	</div>
	<div class="form-group">
		<label for="username">Firstname: </label>
		<input class="form-control" type="text" name="firstname" value="<?= $params['user']->Firstname ?>"/>
	</div>
	<div class="form-group">
		<label for="username">Lastname: </label>
		<input class="form-control" type="text" name="lastname" value="<?= $params['user']->Lastname ?>"/>
	</div>
	<div class="form-group">
		<label for="username">Email: </label>
		<input class="form-control" type="text" name="email" value="<?= $params['user']->Email ?>"/>
	</div>
	<div class="form-group">
		<label for="description">Description: </label>
		<textarea class="form-control" name="description"><?= $params['user']->Description ?></textarea>
	</div>
	<div class="form-group">
		<label for="username">Password: </label>
		<input class="form-control" type="password" name="password" placeholder="Litec123!"/>
	</div>
	<div class="form-group">
		<label for="username">Repeat Password: </label>
		<input class="form-control" type="password" name="repeat" placeholder="Litec123!"/>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>