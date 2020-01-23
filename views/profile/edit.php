<div class="container padding mt-5">
	<div class="card mb-3">
		<h5 class="card-title text-center mt-3">Edit profile for</h5>
		<h3 class="card-title text-center"><?= $params['user']->Username ?></h3>
		<div class="card-body">
			<form action="/profile/edit" method="POST">
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
		</div>
	</div>
</div>