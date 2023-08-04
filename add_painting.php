<?php
include_once('connect.php');
$ID = 3;
$statement = "SELECT * FROM paintings";
$result = (connect()->query($statement));
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Add new painting</title>
    </head>

    <body>
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <h2>Add new painting: </h2>
            
            //<?php            
//            // Get form input values
//            $id = $_POST['add_id'];
//            $title = $_POST['add_title'];
//            $artist = $_POST['add_artist'];
//            $style = $_POST['add_style'];
//            $media = $_POST['add_media'];
//            $finished = $_POST['add_finished'];
//            // Insert data into the table
//            $insert_sql = "INSERT INTO paintings (id, title, artist, style, media, finished)
//            VALUES ('$id', '$title', '$artist', '$style', '$media', '$finished')";
//            ?>

            <div class="input-group mb-3">
                <span class="input-group-text" id="add_id" style="width: 110px;">ID</span>
                <input type="text" class="form-control" placeholder="id" aria-label="id" aria-describedby="add_id">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="add_title" style="width: 110px;">Painting Title</span>
                <input type="text" class="form-control" placeholder="title" aria-label="title" aria-describedby="add_title">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="add_artist" style="width: 110px;">Artist</span>
                <input type="text" class="form-control" placeholder="artist" aria-label="artist" aria-describedby="add_artist">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="add_style" style="width: 110px;">Style</span>
                <input type="text" class="form-control" placeholder="style" aria-label="style" aria-describedby="add_style">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="add_media" style="width: 110px;">Media</span>
                <input type="text" class="form-control" placeholder="media" aria-label="media" aria-describedby="add_media">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="add_finished" style="width: 110px;">Finished</span>
                <input type="text" class="form-control" placeholder="finished" aria-label="finished" aria-describedby="add_finished">
            </div>
            <div class="mb-3">
                <label for="add_thumbnail" class="form-label">Choose thumbnail:</label>
                <input class="form-control" type="file" id="add_thumbnail">
            </div>
            <div class="mb-3">
                <label for="add_full_pic" class="form-label">Choose full picture:</label>
                <input class="form-control" type="file" id="add_full_pic">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success" type="button">Save</button>
            </div>

            <?php
            include_once('footer.php');
            ?>
        </div>>
    </body>
</html>
