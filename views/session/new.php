<div class="container padding mt-5">
	<div class="row justify-content-center">
		<div class="card" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title text-center">Welcome!</h5>
				<h6 class="card-subtitle mb-2 text-muted text-center">Please Log In</h6>
				<hr class="light">
				<form action="/blog/authenticate" method="POST">
					<?php if(array_key_exists('origin', $params)): ?>
						<input type="hidden" name="redirect" value="<?= $params['origin'] ?>"/>
					<?php endif; ?>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="form-control" value="<?= array_key_exists('email', $params) ? $params['email'] : '' ?>" required />
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" required/>
					</div>
					<div class="form-group padding">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="remember"/>
							<label for="remember" class="form-check-label">Remember Me</label>	
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<<<<<<< HEAD
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" required/>
	</div>
	<div class="form-group">
		<label for="remember">Remember Me</label>
		<input type="checkbox" name="remember" class="form-control"/>
	</div>
	<div class="form-group">
		<button type="submit" class="form-control btn btn-primary">Submit</button>
	</div>
</form>
<a href="/signup">No account? Sign Up</a>
=======
</div>
>>>>>>> 2dab9e888a5afb85b06a51b53a1f88fabe275533
