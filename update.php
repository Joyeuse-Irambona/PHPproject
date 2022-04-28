<?php 
    include 'connection.php';

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = 'SELECT * FROM Book WHERE id = ' . $id;
        $result = mysqli_query($connection, $query);
        $serialized_result = mysqli_fetch_assoc($result);

        if(!count($serialized_result)) {
            header('Location: index.php');
        }
        else {
            if(isset($_POST['submit'])) {
                $title = $_POST['title'];
                $author = $_POST['author'];
                $summary = $_POST['summary'];
                $body = $_POST['body'];

                $values = "('$title', '$author', '$summary', '$body');";

                $query = "UPDATE Book SET title = '$title', author = '$author', summary = '$summary', body = '$body' WHERE id = $id ";
                $result = mysqli_query($connection, $query);
                mysqli_close($connection);
                header('Location: index.php');
            }
        }
    } else {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Update Book</title>
    </head>
    <body>
        <div class="body">
            <?php include 'navbar.php' ?>

            <div class="bkcont">
                <h2>Update Book</h2>
                <hr />

                <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo ($serialized_result['title']) ?>" required />
                    <label>Author</label>
                    <input type="text" name="author" value="<?php echo $serialized_result['author'] ?>" required />
                    <label>Description</label>
                    <input type="text" name="summary" value="<?php echo $serialized_result['summary'] ?>" required />
                    <label>Body</label>
                    <textarea rows="6" name="body" required><?php print_r($serialized_result['body']) ?></textarea>
                    <button type="submit" name="submit">Update</button>
                </form>
            </div>
        </div>
    </body>
</html>