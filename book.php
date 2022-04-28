<?php 
    include 'connection.php';

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = 'SELECT * FROM Book WHERE id = ' . $id;
        $result = mysqli_query($connection, $query);
        $serialized_result = mysqli_fetch_assoc($result);
        mysqli_close($connection);

        if(!count($serialized_result)) {
            header('Location: index.php');
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
        <title>Book</title>
    </head>
    <body>
        <div class="body">
            <?php include 'navbar.php' ?>

            <div class="bkb">
                <h2><?php echo $serialized_result['title'] ?></h2>
                <h3><?php echo $serialized_result['author'] ?></h3>

                <p><strong>Summary: </strong><?php echo $serialized_result['body'] ?></p>
                <p><?php echo $serialized_result['body'] ?></p>

                <div class="btn">
                    <a href="update.php?id=<?php echo $serialized_result['id'] ?>">Update</a>
                    <a href="delete.php?id=<?php echo $serialized_result['id'] ?>">Delete</a>
                </div>
            </div>
        </div>
    </body>
</html>