
<?php include 'views/elements/header.php';?>

<?php if (is_array($posts)) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title; ?></h1>
  </div>

	<?php foreach ($posts as $p) {?>
    <h3><a href="<?php echo BASE_URL ?>blog/post/<?php echo $p['pID']; ?>" title="<?php echo $p['title']; ?>"><?php echo $p['title']; ?></a></h3>

	<sub><?php echo date("j F Y - g:i:s A", strtotime($p['date'])); ?> by
		<?php echo $p['userFN'] . " " . $p['userLN']; ?> -
		Category: <?php echo $p['catName']; ?></sub>
	<div style="margin-top:15px;"><a href="<?php echo BASE_URL;?>ajax/get_post_content/?pID=<?php echo $p['pID'];?>" class="btn post-loader">View entire post</a></div>
<?php }?>
</div>

<?php }?>
<script>
$(document).ready(()=>{
	$('.post-loader').click((e)=>{
		e.preventDefault();
		let el = $(this);
		$.ajax({
			url:el.attr('href'),
			type:'GET',
		}).then((data)=>{
			el.parent().append(data);
			el.remove();
		}).catch((err)=>{
			console.error(err);
		});
	});
});
</script>


<?php include 'views/elements/footer.php';?>