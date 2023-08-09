<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Select All - AT2 Sprint 1</title>
    </head>
    <body>
        <!-- Navbar. -->
        <?php
        include_once('navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>All Paintings</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('connect.php');

            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["submit_button"])) {

                    $title = $_POST["add_title"];
                    $artist = $_POST["add_artist"];
                    $style = $_POST["add_style"];
                    $media = $_POST["add_media"];
                    $finished = $_POST["add_finished"];
                    // Convert Images to variables.
                    // Source: https://www.sitepoint.com/community/t/php-getting-image-from-blob/8680
                    $thumbnail = addslashes(file_get_contents($_FILES['add_thumbnail']['tmp_name']));
                    $full_pic = addslashes(file_get_contents($_FILES['add_full_pic']['tmp_name']));
                    $statement = "INSERT INTO paintings (title, artist, style, media, finished, thumbnail, full_pic) VALUES ('$title', '$artist', '$style', '$media', '$finished', '$thumbnail', '$full_pic')";
                    $execute = (connect()->query($statement));
                    echo "Record was added successfully! :).";
                }
            } catch (Exception $ex) {
                echo "Add failed :( Something was entered incorectly. Please check that every box was filled in correctly and try again.";
            }
            ?>
            <!-- Footer. -->
            <?php
            include_once('footer.php');
            ?>
        </div>
    </body>
</html>
