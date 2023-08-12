<!DOCTYPE html>
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
    <!-- Body. -->
    <body>
        <!-- Navbar. -->
        <?php
        include_once('navbar.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM paintings WHERE id = :id";
            $stmt = connect()->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    // Populate variables with fetched data
                    $title = isset($row['title']) ? $row['title'] : '';
                    $artist = isset($row['artist']) ? $row['artist'] : '';
                    $style = isset($row['style']) ? $row['style'] : '';
                    $media = isset($row['media']) ? $row['media'] : '';
                    $finished = isset($row['finished']) ? $row['finished'] : '';
                    $thumbnail = isset($row['thumbnail']) ? $row['thumbnail'] : '';
                    $full_pic = isset($row['full_pic']) ? $row['full_pic'] : '';
                } else {
                    echo "No data found for ID: $id";
                }
            } else {
                echo "Query failed: " . $stmt->errorInfo()[2];
            }
        }
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Edit painting: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="edit_painting_backend.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                <!-- title. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_title" style="width: 110px;">Title</span>
                    <input type="text" class="form-control" placeholder="title" aria-label="title" aria-describedby="add_title" name="add_title" value="<?php echo $title; ?>">
                </div>
                <!-- artist. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_artist" style="width: 110px;">Artist</span>
                    <input type="text" class="form-control" placeholder="artist" aria-label="artist" aria-describedby="add_artist" name="add_artist" value="<?php echo $artist; ?>">
                </div>
                <!-- style. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_style" style="width: 110px;">Style</span>
                    <input type="text" class="form-control" placeholder="style" aria-label="style" aria-describedby="add_style" name="add_style" value="<?php echo $style; ?>">
                </div>
                <!-- media. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_media" style="width: 110px;">Media</span>
                    <input type="text" class="form-control" placeholder="media" aria-label="media" aria-describedby="add_media" name="add_media" value="<?php echo $media; ?>">
                </div>
                <!-- finished. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_finished" style="width: 110px;">Finished</span>
                    <input type="text" class="form-control" placeholder="finished" aria-label="finished" aria-describedby="add_finished" name="add_finished" value="<?php echo $finished; ?>">
                </div>
                
                <!--the file input field itself cannot be pre-filled with a default value pointing to a local file on the user's machine due to browser security restrictions.-->
                <!-- thumbnail. -->
                <div class="mb-3">
                    <label for="add_thumbnail" class="form-label">Choose thumbnail:</label>                    
                    <!-- This is the input element for uploading the thumbnail image -->
                    <input class="form-control" type="file" id="add_thumbnail" name="add_thumbnail">
                    <label class="form-label">Leave blank to keep existing image: </label>
                    <!-- This is the image preview tag that displays the thumbnail if available -->
                    <p> <?php echo '<img class="thumb" src="data:image/png;base64,' . base64_encode($row['thumbnail']) . '"/>'; ?></p>
                </div>
                <!-- full_pic. -->
                <div class="mb-3">
                    <label for="add_full_pic" class="form-label">Choose full picture:</label>
                    <input class="form-control" type="file" id="add_full_pic" name="add_full_pic" value="<?php echo $title; ?>">
                    <label class="form-label">Leave blank to keep existing image: </label>
                    <!-- This is the image preview tag that displays the full_pic if available -->
                    <p> <?php echo '<img class="thumb" src="data:image/png;base64,' . base64_encode($row['full_pic']) . '"/>'; ?></p>
                </div>
                <!-- Save. -->
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" type="submit" name="submit_button">Submit</button>
                </div>
            </form>
            <!-- Footer. -->
            <?php
            include_once('footer.php');
            ?>
        </div>
    </body>
</html>
