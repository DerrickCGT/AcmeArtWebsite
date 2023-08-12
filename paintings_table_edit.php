<!doctype html>
<html lang="en">
    <!-- Connect. -->
    <?php
    include_once('connect.php');
    $result = (connect()->query($statement));
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <body>
        <!-- Table. --> 
        <table class="table">
            <thead>
                <tr>
                    <!-- Headers. --> 
                    <th>ID</th>
                    <th>Painting Title</th>
                    <th>Artist</th>
                    <th>Style</th>
                    <th>Media</th>
                    <th>Finished</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <!-- Content. --> 
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['artist']; ?></td>
                        <td><?php echo $row['style']; ?></td>
                        <td><?php echo $row['media']; ?></td>
                        <td><?php echo $row['finished']; ?></td>
                        <td><?php echo '<img class="thumb" style="width: 100px;" src="data:image/png;base64,' . base64_encode($row['thumbnail']) . '"/>'; ?></td>
                        <td>
                            <a href="edit_painting.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary" name="edit_button">Edit</a>
                            <a href="delete_painting.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger" name="delete_button">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Footer. -->
        <?php
        include_once('footer.php');
        ?>
    </body>
</html>
