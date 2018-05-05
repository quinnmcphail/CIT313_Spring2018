<?php include 'views/elements/header.php';?>
<div class="container">
	<div class="page-header">
   <h1>Update Profile</h1>
  </div>
  <?php if ($message) {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?=$message?>
    </div>
  <?php }?>
   <form id="registerForm" class="form-horizontal" action="<?=BASE_URL?>members/update" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="email" placeholder="Email" value="<?=$u->email;?>" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFirstName">First Name</label>
    <div class="controls">
      <input type="text" id="inputFirstName" name="firstName" placeholder="First Name" value="<?=$u->first_name;?>" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFirstName">Last Name</label>
    <div class="controls">
      <input type="text" id="inputLastName" name="lastName" placeholder="Last Name" value="<?=$u->last_name;?>" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPasswordVerify">Password Verify</label>
    <div class="controls">
      <input type="password" id="inputPasswordVerify" name="passwordVerify" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
        <input type="hidden" name="uID" value="<?=$u->uID?>"/>
      <button type="submit" class="btn">Update</button>
    </div>
  </div>
</form>
</div>
<?php include 'views/elements/footer.php';?>

