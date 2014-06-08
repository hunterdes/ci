<div id="container" style="padding-top:48px;">
	<h2>Please input your password</h2>
	<form action="<?php echo base_url();?>index.php/admin/password?page=<?php echo $main;?>" method="post">
		<label for="pwd">Password</label>
		<input type="password" name="pwd" />
		<input type="submit"/>
	</form>
</div>