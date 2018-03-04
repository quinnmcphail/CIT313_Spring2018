
<?php include('elements/header.php');?>
<?php
if( is_array($post) ) {
	extract($post);?>

<div class="container">
	<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>
<p><?php echo date("j F Y - g:i:s A",strtotime($date));?></p>
<p><?php echo $content;?></p>

</div>
<?php }?>

<?php if( is_array($posts) ) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($posts as $p){?>
    <h3><a href="<?php echo BASE_URL?>blog/view/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>
		<sub><?php echo date("j F Y - g:i:s A",strtotime($p['date']));?> by
		<?php echo $p['userFN']." ".$p['userLN'];?></sub>
		<sub>Category: <?php echo $p['catName'];?></sub>
	<p><?php echo $p['content'];?></p>
<?php }?>
</div>

<?php }?>


<?php include('elements/footer.php');?>