<!doctype html>
<html lang="en">
    <!-- Connect. -->
    <?php
    include_once('connect.php');
    $result = (connect()->query($statement));
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <body>
        <!-- Card_Horizontal -->
        <div class="card mb-3">
            <?php
            foreach ($rows as $row) {
                ?>
                <div class="row g-0">
                    <div class="col-md-4" style="max-height: 500px;">
                        <?php echo '<img class="thumb" style="max-height: 500px;" src="data:image/png;base64,' . base64_encode($row['full_pic']) . '"/>'; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Typography_Description list alignment -->
                            <dl class="row">
                                <dt class="col-sm-2">Painting Title</dt>
                                <dd class="col-sm-9"><?php echo $row['title']; ?></dd>
                                <dt class="col-sm-2">Finished</dt>
                                <dd class="col-sm-9"><?php echo $row['finished']; ?></dd>
                                <dt class="col-sm-2">Paint Media</dt>
                                <dd class="col-sm-9"><?php echo $row['media']; ?></dd>
                                <dt class="col-sm-2">Artist Name</dt>
                                <dd class="col-sm-9"><?php echo $row['artist']; ?></dd>
                                <dt class="col-sm-2">Style</dt>
                                <dd class="col-sm-9"><?php echo $row['style']; ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Footer. -->
        <?php
        include_once('footer.php');
        ?>
    </body>
</html>