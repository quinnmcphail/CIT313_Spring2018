<?php include 'views/elements/header.php';?>
<?php if (is_array($user)) {
    extract($user);}?>
<div class="container">
	<div class="page-header">
        <h1><?=$first_name . ' ' . $last_name?></h1>
    </div>
    <p>First Name: <?=$first_name?></p>
    <p>Last Name: <?=$last_name?></p>
    <p>Email: <?=$email?></p>
<?php include 'views/elements/footer.php';?>