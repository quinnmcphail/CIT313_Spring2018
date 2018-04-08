<?php include 'views/elements/header.php';?>
<div class="container">
<?php if (isset($_GET['action']) && $_GET['action'] == 'logout') {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	Successfully logged out.
    </div>
  <?php }?>
	<div class="page-header">
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
