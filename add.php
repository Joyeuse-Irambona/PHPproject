<?php 
    include 'connection.php';

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $summary = $_POST['summary'];
        $body = $_POST['body'];

        $values = "('$title', '$author', '$summary', '$body');";

        $query = "INSERT INTO Book (title, author, summary, body) VALUES" . $values;
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
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
        <title>Add new book</title>
    </head>
    <body>
        <div class="body">
            <?php include 'navbar.php' ?>

            <div class="bkcont">
                <h2>Add New Book</h2>
                <hr />

                <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label>Title</label>
                    <input type="text" name="title" required />
                    <label>Author</label>
                    <input type="text" name="author" required />
                    <label>Summary</label>                    
                    <input type="text" name="summary" required />
                    <label>Body</label>
                    <textarea rows="6" 
                    name="body" required></textarea>
                    <button type="submit" name="submit">Add Book</button>
                </form>
            </div>
        </div>
    </body>
</html>