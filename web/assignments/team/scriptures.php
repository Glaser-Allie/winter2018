<?php

require "database.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Scripture List</title>
</head>

<body>
<div>

<h1>Scripture Resources</h1>

<?php

$statement = $db->prepare("SELECT book, chapter, verse, content FROM scripture");
$statement->execute();
    
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	echo '<p>';
	echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
	echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
	echo '</p>';
}
?>


</div>

</body>
</html>