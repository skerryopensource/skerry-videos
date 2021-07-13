<!doctype html>
<head>

</head>
    <link rel="stylesheet" href="styles/main.css"/>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php
        include "includes/header.php";
        include "includes/mysql_connection.php";
        include "includes/functions.php";

    ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Video Title"/>
    <br/>
    <input type="text" name="description" placeholder="Video description"/>
    <br/>
    <input type="file" name="file"/>

    <button type="submit" name="upload">Send Video</button>
</form>

<?php
    if(isset($_POST['upload'])) {
        $name = $_FILES['file']['name'];
        $title = $_POST['title'];
        $date = "20/20/2020";
        $description = $_POST['description'];
        $tmp = $_FILES['file']['tmp_name'];

        move_uploaded_file($tmp, "videos/".$name);

        $sql = "INSERT INTO videos (video,title,text,date) VALUES ('$name','$title','$description','$date')";

        if(mysqli_query($database,$sql)) {
            echo "video send to our servers with sucess";
        } else {
            echo "Error: " . $upload . "<br/>" . $database->error;
        }

    }
?>

</body>