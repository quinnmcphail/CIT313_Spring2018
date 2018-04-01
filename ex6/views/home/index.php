<?php include 'views/elements/header.php';?>
<div class="container">
<?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	Successfully logged out.
    </div>
  <?php }?>
	<div class="page-header">
    <h1>Home</h1>
  </div>
</div>
<?php include 'views/elements/footer.php';?>
