<?php include 'views/elements/header.php';?>

<div class="container">
	<div class="page-header">
   <h1><?=ucwords($task);?> Post</h1>
  </div>
  <?php if ($message) {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?=$message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
      </div>
    </div>
</div>
<?php include 'views/elements/footer.php';?>

