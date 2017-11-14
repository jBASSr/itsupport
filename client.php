<html>
<head>
<title> Client Side for Database </title>
</head>
<body>
<?php echo '<p> Web Server for Client Side for Database </p>'; 

$db_connection = pg_connect("host=localhost dbname=itsupport
user=itsupport password=jrdd3420") or die('Failed to connect'); 

pg_close($db_connection);

?>
</body>
</html>
