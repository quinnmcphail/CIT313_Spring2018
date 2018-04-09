<?php include 'views/elements/header.php';?>
<div class="container">
<?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	Successfully logged out.
    </div>
  <?php }?>
	<div class="page-header">
  <p>Your Location: <span id="location"></span></p>
    <h1>Articles From <?php echo $channel_info->title; ?></h1>
  </div>
  <?php foreach ($feed_data as $article) {?>
    <h3><a href="<?php echo $article['link']; ?>"><?php echo $article['title']; ?></a></h3>
	<p><?php echo $article['description']; ?></p>
	<sub><?php echo $article["pubDate"]; ?> -
		Category: <?php echo $article['category']; ?></sub>
  <?php }?>
</div>
<?php include 'views/elements/footer.php';?>
<script>
$(document).ready(function(){
    $.ajax({
      type:'POST',
      url:'https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyAqE-JNdbQVfq_N0xGGFlR2MRXDkqnG-P0',
      success:function(geo){
        showLocation(geo);
      }
    })
});

function showLocation(geo){
    var latitude = geo.location.lat;
    var longitude = geo.location.lng;
    setTimeout(() => {
      $.ajax({
        type:'POST',
        url:'<?php echo BASE_URL; ?>getLocation',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
    }, 2000);
}
</script>
