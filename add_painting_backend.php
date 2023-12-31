<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Add - AT2 Sprint 1</title>
    </head>
    <body>
        <!-- Navbar. -->
        <?php
        include_once('navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Add Painting Status</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('connect.php');

            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["submit_button"])) {

                    $title = $_POST["add_title"] ? $_POST["add_title"] : '';
                    $artist = $_POST["add_artist"] ? $_POST["add_artist"] : '';
                    $style = $_POST["add_style"] ? $_POST["add_style"] : '';
                    $media = $_POST["add_media"] ? $_POST["add_media"] : '';
                    $finished = $_POST["add_finished"] ? $_POST["add_finished"] : '';
                    // Convert Images to variables.
                    // Source: https://www.sitepoint.com/community/t/php-getting-image-from-blob/8680
                    $thumbnail = $_FILES['add_thumbnail']['tmp_name'] ? addslashes(file_get_contents($_FILES['add_thumbnail']['tmp_name'])) : '';
                    $full_pic = $_FILES['add_full_pic']['tmp_name'] ? addslashes(file_get_contents($_FILES['add_full_pic']['tmp_name'])) : '';
                    // Gives the user feedback if the size of an image they trying to upload is too large.
                    if ((!empty($_FILES['add_thumbnail']['tmp_name'])) && (!empty($_FILES['add_thumbnail']['tmp_name']))) {
                        if ((filesize(($_FILES['add_thumbnail']['tmp_name'])) > 65535) || (filesize(($_FILES['add_full_pic']['tmp_name'])) > 16777215)) {
                            echo "Error. The size of the image you tried to upload was to large. Thumbnail is limited to 65,535 bytes. Full picture is limited to 16,777,215 bytes.";
                            ?>
                            <img src = "images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
                            <?php
                            return;
                        }
                    }
                    $statement = "INSERT INTO paintings (title, artist, style, media, finished, thumbnail, full_pic) VALUES ('$title', '$artist', '$style', '$media', '$finished', '$thumbnail', '$full_pic')";
                    $execute = (connect()->query($statement));
                    echo "Record was added successfully! :).";
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