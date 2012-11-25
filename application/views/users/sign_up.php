<html>
<body>
<h1>Login page</h1>


<?php echo form_open('users/signup'); ?>
<input type="hidden" name="userId" value="<?php echo set_value('userId', isset($user_info) ? $user_info->userId: '0'); ?>" />

<h5>First Name</h5>
<?php echo form_error('firstname'); ?>
<input type="text" name="firstName" value="<?php echo set_value('firstName', isset($user_info) ? $user_info->firstName: ''); ?>" size="50" />

<h5>Last Name</h5>
<?php echo form_error('lastname'); ?>
<input type="text" name="lastName" value="<?php echo set_value('lastName', isset($user_info) ? $user_info->lastName: ''); ?>" size="50" />

<h5>Email</h5>
<?php echo form_error('email'); ?>
<input type="text" name="email" value="<?php echo set_value('email', isset($user_info) ? $user_info->email: ''); ?>" size="50" />

<h5>city</h5>
<?php echo form_error('city'); ?>
<input type="text" name="city" value="<?php echo set_value('city', isset($user_info) ? $user_info->city: ''); ?>" size="50" />

<h5>zip</h5>
<?php echo form_error('zip'); ?>
<input type="text" name="zip" value="<?php echo set_value('zip', isset($user_info) ? $user_info->zip: ''); ?>" size="50" />

<h5>country</h5>
<?php echo form_error('country'); ?>
<input type="text" name="country" value="<?php echo set_value('country', isset($user_info) ? $user_info->country: ''); ?>" size="50" />

<h5>address</h5>
<?php echo form_error('address'); ?>
<input type="text" name="address" value="<?php echo set_value('address', isset($user_info) ? $user_info->address: ''); ?>" size="50" />

<h5>phone</h5>
<?php echo form_error('phone'); ?>
<input type="text" name="phone" value="<?php echo set_value('phone', isset($user_info) ? $user_info->phone: ''); ?>" size="50" />

<h5>Username</h5>
<?php echo form_error('username'); ?>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<h5>Password</h5>
<?php echo form_error('password'); ?>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<?php echo form_error('passconf'); ?>
<input type="password" name="passconf" value="" size="50" />

<div><input type="submit" value="Sign Up" /></div>
</form>

</body>

</html>