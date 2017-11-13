<html>
<head>
<title> IT Support Example </title>
</head>
<body>
<?php 
    echo '<p> Web page for IT Support Database </p>'; 
    $db_connection = pg_connect("host=localhost dbname=itsupport
user=itsupport password=jrdd3420") or die('Failed to connect'); 
$query = 'SELECT * FROM client';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
echo "<table>\n";
    echo "\t<tr>\n";
    for ($i = 0; $i <= 11; $i++) {
    $fieldname = pg_field_name($result, $i);
    echo "\t\t<th>$fieldname</th>";
    }
    echo "\t</tr>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
pg_free_result($result);
pg_close($db_connection);

?>
</body>
</html>

