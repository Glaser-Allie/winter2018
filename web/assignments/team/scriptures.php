<?php
session_start();
    require_once 'database.php';
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PGSQL Connect to DB</title>
</head>
<body>
    <h1>Scripture Resources</h1>

    <?php
        $statement = $db->query('SELECT book, chapter, verse, content FROM scriptures.scriptures');
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
          echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] .':' . $row['verse'] . ' </b>- ' . $row['content'] . '</p>';
        }
    ?>
</body>
</html>