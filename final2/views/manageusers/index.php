<?php include 'views/elements/header.php';?>
<div class="container">
<?php if ($message) {?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?=$message?>
    </div>
  <?php }?>
	<div class="page-header">
   <h1><?=$title?></h1>
  </div>
  <table class="table table-striped">
    <tr>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Approve</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($users as $u) {?>
    <tr>
        <td><a href="<?php echo BASE_URL ?>members/user/<?=$u['uID'];?>"><?=$u['email'];?></a></td>
        <td><?=$u['first_name'];?></td>
        <td><?=$u['last_name'];?></td>
        <td><?php if($u['active']==0){ ?><a href="<?=BASE_URL;?>manageusers/approve/<?=$u['uID'];?>" class="btn">Approve</a><?php } ?></td>
        <td><?php if($u['user_type']!=1){ ?><a href="<?=BASE_URL;?>manageusers/delete/<?=$u['uID'];?>" class="btn">Delete</a><?php } ?></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php include 'views/elements/footer.php';?>