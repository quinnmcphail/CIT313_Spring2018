
<?php include 'views/elements/header.php';?>

<?php if (is_array($posts)) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title; ?></h1>
  </div>

	<?php foreach ($posts as $p) {?>
    <h3><a href="<?php echo BASE_URL ?>blog/post/<?php echo $p['pID']; ?>" title="<?php echo $p['title']; ?>"><?php echo $p['title']; ?></a></h3>
	<?php if($u->isAdmin()){?>
	<a class="btn" href="<?= BASE_URL ?>blog/post/manageposts/edit/<?=$p['pID']?>">Edit Post</a>
	<a class="btn" href="<?= BASE_URL ?>blog/post/manageposts/delete/<?=$p['pID']?>">Delete Post</a>
	<?php }?>

	<sub><?php echo date("j F Y - g:i:s A", strtotime($p['date'])); ?> by
		<?php echo $p['userFN'] . " " . $p['userLN']; ?> -
		Category: <?php echo $p['catName']; ?></sub>
	<div style="margin-top:15px;"><a href="<?php echo BASE_URL; ?>ajax/get_post_content/?pID=<?php echo $p['pID']; ?>" class="btn post-loader">View entire post</a></div>
<?php }?>
</div>

<?php }?>


<?php include 'views/elements/footer.php';?>
<script>
$(document).ready(function(){
	$('.post-loader').click(function(e){
		e.preventDefault();
		let el = $(this);
		$.ajax({
			url:el.attr('href'),
			type:'GET',
			success:function(data){
				el.parent().append(data);
				el.remove();
			}
		});
	});
});
</script>