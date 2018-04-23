
<?php include 'views/elements/header.php';?>
<?php
if (is_array($post)) {
    extract($post);
}?>

<div class="container">
	<div class="page-header">

<h1><?php echo $title; ?></h1>
  </div>
<p><?php echo $content; ?></p>
<sub><?php echo date("j F Y - g:i:s A", strtotime($date)); ?> by
		<?php echo $userFN . " " . $userLN; ?> -
		Category: <?php echo $catName; ?></sub>
<hr>
<h2>Comments</h2>
<div style="margin-top:15px;"><a href="<?php echo BASE_URL; ?>ajax/get_post_comments/?pID=<?php echo $pID; ?>" class="btn post-loader">View All Comments</a></div>
</div>


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
				let comments = $("<div></div>");
				data = JSON.parse(data);
				data.map(e=>{
					comments.append(`<hr><p>${e.commentText}</p><sub>${e.userFN} ${userLN} commented on ${e.Date}</sub>`);
				});
				el.parent().append(comments);
				el.remove();
			}
		});
	});
});
</script>