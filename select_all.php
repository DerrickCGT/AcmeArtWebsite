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
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>All Paintings</h2>
            <?php
            $statement = "SELECT * FROM paintings";
            //Table
            include_once('paintings_table.php');
            ?>
        </div>
    </body>
</html>
