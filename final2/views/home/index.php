<?php include 'views/elements/header.php';?>
<div class="container">
<div class="row">
<div class="span8">
<?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	Successfully logged out.
    </div>
  <?php }?>
	<div class="page-header">
  <h3>Current Weather For: <span id="location"></span></h3>
  <h4>Conditions: <span id="weather"></span></h4>
  <h4>Temperature: <span id="temp"></span></h4>
  <h4>Wind: <span id="wind"></span></h4>
  <h4>Humidity: <span id="humidity"></span> (<span id="trend"></span>)</h4>
    <h1>Articles From <?php echo $channel_info->title; ?></h1>
  </div>
  <?php foreach ($feed_data as $article) {?>
    <h3><a href="<?php echo $article['link']; ?>"><?php echo $article['title']; ?></a></h3>
	<p><?php echo $article['description']; ?></p>
	<sub><?php echo $article["pubDate"]; ?> -
		Category: <?php echo $article['category']; ?></sub>
  <?php }?>
</div>
<div class="span4">
<h1>Test</h1>
</div>
</div>
</div>
<?php include 'views/elements/footer.php';?>
<script>
$(document).ready(function(){
    $.ajax({
      type:'POST',
      url:'https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyAqE-JNdbQVfq_N0xGGFlR2MRXDkqnG-P0'
    }).then((data)=>{
      getLocation(data);
    });
});

function getLocation(geo){
    var latitude = geo.location.lat;
    var longitude = geo.location.lng;
    $.ajax({
        type:'POST',
        url:'<?php echo BASE_URL; ?>ajax/get_location',
        data:'latitude='+latitude+'&longitude='+longitude
    }).then((data)=>{
      getWeather(data);
    });
}

function getWeather(zip){
  $.ajax({
    type:'POST',
    url:'<?php echo BASE_URL; ?>ajax/get_weather',
    data:'zip='+zip
  }).then((data)=>{
    let dataObj = JSON.parse(data);
    $('#location').html(dataObj.current_observation.display_location.full);
    $('#weather').html(dataObj.current_observation.weather);
    $('#temp').html(dataObj.current_observation.temperature_string);
    $('#wind').html(dataObj.current_observation.wind_string);
    $('#humidity').html(dataObj.current_observation.pressure_in);
    $('#trend').html(dataObj.current_observation.pressure_trend);
    let image = $('<img>');
    image.attr("src",dataObj.current_observation.icon_url);
    image.height("1.17em");
    image.appendTo('#location');
  })
}
</script>
