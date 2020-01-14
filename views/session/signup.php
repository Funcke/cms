<h3>Welcome!</h3>
<h4>Please Sign Up</h4>
<form action="/blog/authenticate" method="POST">
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