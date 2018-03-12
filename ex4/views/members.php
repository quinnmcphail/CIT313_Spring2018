<?php include 'elements/header.php';?>
<?php if (is_array($user)) {
    extract($user);?>
<div class="container">
	<div class="page-header">
        <h1><?=$first_name . ' ' . $last_name?></h1>
    </div>
    <p>First Name: <?=$first_name?></p>
    <p>Last Name: <?=$last_name?></p>
    <p>Email: <?=$email?></p>
<?php }?>
<?php if (is_array($users)) {?>
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
        <td><a href="<?php echo BASE_URL ?>members/view/<?=$u['uID'];?>"><?=$u['email'];?></a></td>
        <td><?=$u['first_name'];?></td>
        <td><?=$u['last_name'];?></td>
    </tr>
    <?php }?>
  </table>
</div>
<?php }?>
<?php include 'elements/footer.php';?>