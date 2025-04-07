<?php

require_once "../etc/config.php";

$authors = Author::findAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Article</title>
</head>

<body>
    <a href="employeeForm.php">Edit Article</a>
    <table border=2>
        <thead>
            <tr>
                <th>id</th>
                <th>first name</th>
                <th>last name</th>
        </thead>
        <tbody>
            <?php foreach ($authors as $author) { ?>

                <tr>
                    <td><?= $author->id ?></td>
                    <td><?= $author->first_name ?></td>
                    <td><?= $author->last_name ?></td>
                    <td style="disaply: flex">
                        <form method="POST" action="./deleteAuthor.php">
                            <input type="hidden" value="<?= $author->id ?>" name="delete-id">
                            <input type="submit" value="delete">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="./editAuthor.php">
                            <input type="hidden" value="<?= $author->id ?>" name="edit-id">
                            <input type="submit" value="edit">
                        </form>
                    </td>
                </tr>

            <?php } ?>


        </tbody>
    </table>
</body>

</html>