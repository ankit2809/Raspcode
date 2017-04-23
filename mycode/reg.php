<?php
session_start();
if(isset($_SESSION["counter"]))
{
$counter = $_SESSION["counter"];
}
else
{
$counter = 0;
}
$_SESSION["counter"] = $counter + 1;
?>

<html>
<body>
<?php print_r($_POST); ?>
<br>
<br>
You have visited <?php print_r($counter) ?> times !
<br>
<br>
<!?php print_r($_COOKIE); ?>
<br>
<br>
<!?php print_r($_SERVER); ?>
<br>
<br>
<!?php print_r($GLOBALS); ?>
<br>
<br>
</body>
</html>
