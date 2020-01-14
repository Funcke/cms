<div class="container padding mt-5">
	<div class="row justify-content-center">
		<div class="card" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title text-center">Welcome!</h5>
				<h6 class="card-subtitle mb-2 text-muted text-center">Please Sign Up</h6>
				<hr class="light">
				<form action="/authenticate" method="POST">
					<?php if(array_key_exists('origin', $params)): ?>
						<input type="hidden" name="redirect" value="<?= $params['origin'] ?>"/>
					<?php endif; ?>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="form-control" value="<?= array_key_exists('email', $request->session['template']) ? $params->session['temaplte']['email'] : '' ?>" required />
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" required/>
					</div>
					<div class="form-group">
						<label for="password">Password Repeat</label>
						<input type="password" name="password_rep" class="form-control" required/>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary">Submit</button>
					</div>
				</form>
				<a href="/authenticate">Already have a user? Login</a>
			</div>
		</div>
	</div>
</div>