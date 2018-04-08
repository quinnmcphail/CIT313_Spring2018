<?php include 'views/elements/header.php';?>
<div class="container">
	<div class="page-header">
   <h1><?=$title?></h1>
  </div>
  <table class="table table-striped">
    <tr>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>

    <?php foreach ($users as $u) {?>
    <tr>
        <td><a href="<?php echo BASE_URL ?>members/user/<?=$u['uID'];?>"><?=$u['email'];?></a></td>
        <td><?=$u['first_name'];?></td>
        <td><?=$u['last_name'];?></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php include 'views/elements/footer.php';?>