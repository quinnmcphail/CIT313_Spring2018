<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function loadClasses($class)
{
    include_once 'classes/' . strtolower($class) . '.class.php';
}

spl_autoload_register('loadClasses');

$registeredUser = new RegisteredUser('user', 'Regular User');
$admin = new Admin('qmcphail', 'Administrator');

$registeredUser->first_name = 'User';
$registeredUser->last_name = 'Name';
$registeredUser->email_address = 'user@name.com';

$admin->first_name = 'Quinn';
$admin->last_name = 'McPhail';
$admin->email_address = 'quinn@mcphail.com';

echo "User Level: " . $registeredUser->user_level . "<br>";
echo "Registered User ID: " . $registeredUser->user_id . "<br>";
echo "Registered User Type: " . $registeredUser->user_type . "<br>";
echo "Registered First Name: " . $registeredUser->first_name . "<br>";
echo "Registered Last Name: " . $registeredUser->last_name . "<br>";
echo "Registered Email Address: " . $registeredUser->email_address . "<br><hr>";

echo "User Level: " . $admin->user_level . "<br>";
echo "Admin User ID: " . $admin->user_id . "<br>";
echo "Admin User Type: " . $admin->user_type . "<br>";
echo "Admin First Name: " . $admin->first_name . "<br>";
echo "Admin Last Name: " . $admin->last_name . "<br>";
echo "Admin Email Address: " . $admin->email_address . "<br><hr>";

echo "Math Function: " . Admin::mathFunction(4, 6) . "<br><hr>";
?>
<form action="results.php" method="post">
First Name: <input type="text" name="firstName"><br>
Last Name: <input type="text" name="lastName"><br>
Email Address: <input type="email" name="email"><br>
<input type="submit">
</form>
