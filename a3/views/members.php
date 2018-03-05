<?php include 'elements/header.php';?>
<div class="container">
	<div class="page-header">
   <h1> the Members View </h1>
  </div>
  <table class="table table-striped">
    <tr>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    <?php if (is_array($users)) {
    foreach ($users as $u) {?>
    <tr>
        <td><?=$u['email'];?></td>
        <td><?=$u['first_name'];?></td>
        <td><?=$u['last_name'];?></td>
    </tr>
    <?php }}?>
  </table>
</div>
<?php include 'elements/footer.php';?>