<?php 
    include 'connection.php';

    $query = "SELECT * FROM Book";
    $result = mysqli_query($connection, $query);
    $serialized_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Book app</title>
    </head>
    <body>
        <div class="body">
            <?php include 'navbar.php' ?>

            <div class="bkcont">
                <h2>Book list</h2>
                <hr />

                <div class="list">
                    <?php if(count($serialized_result)) { ?>
                        <?php foreach($serialized_result as $book) { ?>
                            <a href="book.php?id=<?php echo $book['id'] ?>">
                                <div class="book">
                                    <h3><?php echo $book['title'] ?></h3>
                                    <p><?php echo $book['summary'] ?></p>
                                    <p class="auth"><?php echo $book['author'] ?></p>
                                </div>
                            </a>
                        <?php } ?>
                    <?php } else { ?>                    

                        <div class="nobook">
                            <h3>You have not yet add book</h3>
                            <a href="add.php">Add new Book</a>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>