<html>
<body>
<h1>Login page</h1>

<?php if ($login_failed) : ?>
    <span id="login-failed-message">Login failed</span>
<?php endif; ?>

<h5>Username</h5>
<?php echo form_open('users/index'); ?>
<?php echo form_error('username'); ?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<?php echo form_error('password'); ?>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<div><input type="submit" value="Login" /></div>
</form>

</body>

</html>