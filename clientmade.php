<?php  
include("db.php");
?>

<! DOCTYPE html>
<html lang = "en">
<head>
</head>
<body>
<p> Client has been created! </p>

<?php echo 'Your client ID is ' . htmlspecialchars($_GET["cid"]); ?>
</body>
</html>
