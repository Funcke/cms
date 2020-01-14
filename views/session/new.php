<h3>Welcome!</h3>
<h4>Please Log In</h4>
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
	<div class="form-group">
		<label for="remember">Remember Me</label>
		<input type="checkbox" name="remember" class="form-control"/>
	</div>
	<div class="form-group">
		<button type="submit" class="form-control btn btn-primary">Submit</button>
	</div>
</form>