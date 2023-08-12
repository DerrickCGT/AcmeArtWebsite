<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Edit - AT2 Sprint 1</title>
    </head>
    <body>
        <!-- Navbar. -->
        <?php
        include_once('navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Edit Painting Status</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('connect.php');

            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["submit_button"])) {
                    $id = $_GET["id"];
//                    // PK cannot be null & unique.
//                    $add_id = isset($_POST["add_id"]) ? $_POST["add_id"] : '';
//
//                    if ($add_id == $id) {
//                        return;
//                    }
                    
                    $title = $_POST["add_title"] ? $_POST["add_title"] : '';
                    $artist = $_POST["add_artist"] ? $_POST["add_artist"] : '';
                    $style = $_POST["add_style"] ? $_POST["add_style"] : '';
                    $media = $_POST["add_media"] ? $_POST["add_media"] : '';
                    $finished = $_POST["add_finished"] ? $_POST["add_finished"] : '';
                    if ((empty($_FILES['add_thumbnail']['tmp_name'])) && (empty($_FILES['add_full_pic']['tmp_name']))) {
                        $statement = "UPDATE paintings SET id = '$id', title = '$title', artist = '$artist', style = '$style', media = '$media', finished = '$finished' WHERE id = '$id'";
                    }
                    if ((!empty($_FILES['add_thumbnail']['tmp_name'])) && (empty($_FILES['add_full_pic']['tmp_name']))) {
                        // Gives the user feedback if the size of an image they trying to upload is too large.
                        if ((filesize(($_FILES['add_thumbnail']['tmp_name'])) > 65535)) {
                            echo "Error. The size of the image you tried to upload was to large. Thumbnail is limited to 65,535 bytes. Full picture is limited to 16,777,215 bytes.";
                            ?>
                            <img src = "images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
                            <?php
                            return;
                        }
                        $thumbnail = $_FILES['add_thumbnail']['tmp_name'] ? addslashes(file_get_contents($_FILES['add_thumbnail']['tmp_name'])) : '';
                        $statement = "UPDATE paintings SET id = '$id', title = '$title', artist = '$artist', style = '$style', media = '$media', finished = '$finished', thumbnail = '$thumbnail' WHERE id = '$id'";
                    }
                    if ((empty($_FILES['add_thumbnail']['tmp_name'])) && (!empty($_FILES['add_full_pic']['tmp_name']))) {
                        // Gives the user feedback if the size of an image they trying to upload is too large.
                        if ((filesize(($_FILES['add_full_pic']['tmp_name'])) > 16777215)) {
                            echo "Error. The size of the image you tried to upload was to large. Thumbnail is limited to 65,535 bytes. Full picture is limited to 16,777,215 bytes.";
                            ?>
                            <img src = "images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
                            <?php
                            return;
                        }
                        $full_pic = $_FILES['add_full_pic']['tmp_name'] ? addslashes(file_get_contents($_FILES['add_full_pic']['tmp_name'])) : '';
                        $statement = "UPDATE paintings SET id = '$id', title = '$title', artist = '$artist', style = '$style', media = '$media', finished = '$finished', full_pic = '$full_pic' WHERE id = '$id'";
                    }
                    if ((!empty($_FILES['add_thumbnail']['tmp_name'])) && (!empty($_FILES['add_full_pic']['tmp_name']))) {
                        // Gives the user feedback if the size of an image they trying to upload is too large.
                        if ((filesize(($_FILES['add_thumbnail']['tmp_name'])) > 65535) || (filesize(($_FILES['add_full_pic']['tmp_name'])) > 16777215)) {
                            echo "Error. The size of the image you tried to upload was to large. Thumbnail is limited to 65,535 bytes. Full picture is limited to 16,777,215 bytes.";
                            ?>
                            <img src = "images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
                            <?php
                            return;
                        }
                        $thumbnail = $_FILES['add_thumbnail']['tmp_name'] ? addslashes(file_get_contents($_FILES['add_thumbnail']['tmp_name'])) : '';
                        $full_pic = $_FILES['add_full_pic']['tmp_name'] ? addslashes(file_get_contents($_FILES['add_full_pic']['tmp_name'])) : '';
                        $statement = "UPDATE paintings SET id = '$id', title = '$title', artist = '$artist', style = '$style', media = '$media', finished = '$finished', thumbnail = '$thumbnail', full_pic = '$full_pic' WHERE id = '$id'";
                    }
                    $execute = (connect()->query($statement));
                    echo "Record was updated successfully! :).";
                }
            } catch (Exception $ex) {
                echo "Add failed :( Something was entered incorectly. Please check that every box was filled in correctly and try again.";
                ?>
                <img src = "images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
                <?php
            }
            ?>
            <!-- Footer. -->
            <?php
            include_once('footer.php');
            ?>
        </div>
    </body>
</html>