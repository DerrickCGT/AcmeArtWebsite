<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Select by Style - AT2 Sprint 1</title>
    </head>
    <body>
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Paintings by Style</h2>
            <?php
            $selection = $_GET['TAG'];
            $statement = "SELECT * FROM paintings WHERE style = '$selection'";
            //Table
            include_once('paintings_table.php');
            ?>
        </div>
    </body>
</html>
