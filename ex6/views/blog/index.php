
<?php include 'views/elements/header.php';?>

<?php if (is_array($posts)) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title; ?></h1>
  </div>

	<?php foreach ($posts as $p) {?>
    <h3><a href="<?php echo BASE_URL ?>blog/post/<?php echo $p['pID']; ?>" title="<?php echo $p['title']; ?>"><?php echo $p['title']; ?></a></h3>
	<p><?php echo $p['content']; ?></p>
	<sub><?php echo date("j F Y - g:i:s A", strtotime($p['date'])); ?> by
		<?php echo $p['userFN'] . " " . $p['userLN']; ?> -
		Category: <?php echo $p['catName']; ?></sub>
<?php }?>
</div>

<?php }?>


<?php include 'views/elements/footer.php';?>