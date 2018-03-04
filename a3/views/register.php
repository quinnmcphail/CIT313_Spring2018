<?php include 'elements/header.php';?>
<div class="container">
	<div class="page-header">
   <h1> the Register View </h1>
   <form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="email" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFirstName">First Name</label>
    <div class="controls">
      <input type="text" id="inputFirstName" name="firstName" placeholder="First Name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputFirstName">Last Name</label>
    <div class="controls">
      <input type="text" id="inputLastName" name="lastName" placeholder="Last Name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="password" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Register</button>
    </div>
  </div>
</form>

  </div>
</div>
<?php include 'elements/footer.php';?>

