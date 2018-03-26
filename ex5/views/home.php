<?php include 'elements/header.php';?>
<div class="container">
<?php if ($message) {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?=$message?>
    </div>
  <?php }?>
	<div class="page-header">
    <h1>Home</h1>
  </div>
</div>
<?php include 'elements/footer.php';?>
