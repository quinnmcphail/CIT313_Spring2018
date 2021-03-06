
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
<div id="comments" style="margin-top:15px;"></div>
<a href="" class="btn comment-loader">View All Comments</a>
<?php if ($u->isRegistered()) {?>
	<form id="commentForm" method="post" style="margin-top:21px;">
          <input id="commentText" type="text" class="span6" name="commentText" placeholder="Add a comment" style="margin-bottom:0px;">
          <input type="hidden" name="postID" value="<?=$pID?>"/>
		  <input type="hidden" name="uID" value="<?=$u->uID?>"/>
          <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
<?php }?>
</div>


<?php include 'views/elements/footer.php';?>
<script>
$(document).ready(function(){
	$('.comment-loader').click(function(e){
		e.preventDefault();
		let el = $(this);
		refreshComments();
	});
	$('#submit').click(function(e) {
		e.preventDefault();
          $.ajax({
             type: "POST",
             url: "<?=BASE_URL?>ajax/add_post_comment",
             data: `${$("#commentForm").serialize()}&date=${Date_toYMD()}`,
             success: function(msg) {
				 $("#commentText").val("");
				 refreshComments();
             }
          });
       });
	   function Date_toYMD() {
        let year, month, day,hour,minute,second;
		let date = new Date(Date.now());
        year = String(date.getFullYear());
        month = String(date.getMonth() + 1);

        if (month.length == 1) {
            month = "0" + month;
        }
        day = String(date.getDate());
        if (day.length == 1) {
            day = "0" + day;
        }
		hour = String(date.getHours());
		if (hour.length == 1) {
            hour = "0" + hour;
        }
		minute = String(date.getMinutes());
		if (minute.length == 1) {
            minute = "0" + minute;
        }
		second = String(date.getSeconds());
		if (second.length == 1) {
            second = "0" + second;
        }
        return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
    }
function refreshComments(){
	$.ajax({
			url:"<?php echo BASE_URL; ?>ajax/get_post_comments/?pID=<?php echo $pID; ?>",
			type:'GET',
			success:function(data){
				let comments = $("<div></div>");
				data = JSON.parse(data);
				if(data!==null){
					data.map(e=>{
						let temp = $(`<hr><p>${e.commentText}<?php if ($u->isAdmin()) {?> <a comment="${e.commentID}" class="btn comment-deleter">Delete Comment</a><?php }?></p><sub>${e.UserFN} ${e.UserLN} commented on ${e.Date}</sub>`);
						temp.click(function(e){
							e.preventDefault();
							$.ajax({
             type: "POST",
             url: "<?=BASE_URL?>ajax/delete_post_comment",
             data: `commentID=${$("a",this).attr("comment")}`,
             success: function(msg) {
				 refreshComments();
             }
          })
						});
					comments.append(temp);
				});
				}else{
					comments.append("<hr><p>No comments.</p>")
				}
				$("#comments").html("");
				$("#comments").append(comments);
				$('.comment-loader').remove();
			}
		});
}
function deleteComment(){
	let el=$(this);
	console.log(this);
}
});
</script>