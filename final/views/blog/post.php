
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
<a href="<?php echo BASE_URL; ?>ajax/get_post_comments/?pID=<?php echo $pID; ?>" class="btn post-loader">View All Comments</a>
<?php if ($u->isRegistered()) {?>
	<form id="commentForm" method="post" style="margin-top:21px;">
          <input id="commentText" type="text" class="span6" name="commentText" placeholder="Add a comment" style="margin-bottom:0px;">
          <input type="hidden" name="pID" value="<?=$pID?>"/>
		  <input type="hidden" name="uID" value="<?=$u->uID?>"/>
          <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
<?php }?>
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
					comments.append(`<p>${e.commentText}</p><sub>${e.UserFN} ${e.UserLN} commented on ${e.Date}</sub>`);
				});
				$("#comments").append(comments);
				el.remove();
			}
		});
	});
	$('#submit').click(function(e) {
		e.preventDefault();
          $.ajax({
             type: "POST",
             url: "<?=BASE_URL?>ajax/add_post_comment",
             data: {'form':$("#commentForm").serialize(),'date':Date_toYMD()},
             success: function(msg) {
				 $("#commentText").val("");
             }
          });
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
</script>