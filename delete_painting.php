<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Delete - AT2 Sprint 1</title>
    </head>
    <body>
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Delete Painting</h2>
            <?php
            $selection = $_GET['id'];
            $statement = "SELECT * FROM paintings WHERE id = '$selection'";
            //Table
            include_once('paintings_table_delete.php');
            ?>
        </div>
    </body>
</html>
