
<?php include 'views/elements/header.php';?>
<?php
if (is_array($post)) {
    extract($post);?>

<div class="container">
	<div class="page-header">

<h1><?php echo $title; ?></h1>
  </div>
<p><?php echo $content; ?></p>
<sub><?php echo date("j F Y - g:i:s A", strtotime($date)); ?> by
		<?php echo $userFN . " " . $userLN; ?> -
		Category: <?php echo $catName; ?></sub>

</div>
<?php }?>


<?php include 'views/elements/footer.php';?>