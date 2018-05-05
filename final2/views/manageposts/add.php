<?php include 'views/elements/header.php';?>

<div class="container">
	<div class="page-header">
   <h1>Add Post</h1>
  </div>
  <?php if ($message) {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?=$message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?=BASE_URL?>manageposts/<?=$task?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?=$title?>" required>
          <label>Date</label>
          <input type="datetime-local" name="post_date" value="<?=date("Y-m-d\TH:i:s", strtotime($date));?>" required>
          <label>Category</label>
          <select name="post_category">
          <?php if (is_array($categories)) {
    foreach ($categories as $c) {?>
            <option value="<?=$c["categoryID"];?>" <?=$categoryID == $c["categoryID"] ? 'selected' : '';?>><?=$c["name"];?></option>
          <?php }}?>
          </select>
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px" required><?=$content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?=$pID?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>


      </div>
    </div>
</div>
<?php include 'views/elements/footer.php';?>

