<html>
<body>
<h1>Login page</h1>


<?php echo form_open('users/signup'); ?>

<h5>First Name</h5>
<?php echo form_error('firstname'); ?>
<input type="text" name="firstName" value="<?php echo set_value('firstName'); ?>" size="50" />

<h5>Last Name</h5>
<?php echo form_error('lastname'); ?>
<input type="text" name="lastName" value="<?php echo set_value('lastName'); ?>" size="50" />

<h5>Email</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>city</h5>
<?php echo form_error('city'); ?>
<input type="text" name="city" value="<?php echo set_value('city'); ?>" size="50" />

<h5>country</h5>
<?php echo form_error('country'); ?>
<input type="text" name="country" value="<?php echo set_value('country'); ?>" size="50" />

<h5>address</h5>
<?php echo form_error('address'); ?>
<input type="text" name="address" value="<?php echo set_value('address'); ?>" size="50" />

<h5>phone</h5>
<?php echo form_error('phone'); ?>
<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" size="50" />

<h5>Username</h5>
<?php echo form_error('username'); ?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<?php echo form_error('password'); ?>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<?php echo form_error('passconf'); ?>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<div><input type="submit" value="Sign Up" /></div>
</form>

</body>

</html>