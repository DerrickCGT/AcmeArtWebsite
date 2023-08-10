<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Select by Artist - AT2 Sprint 1</title>
    </head>
    <body>
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Paintings by Artist</h2>
            <?php
            $selection = $_GET['TAG'];
            echo "You filtered for: <strong class='bold-text'>$selection</strong> <br>";
            echo "Result: ";
            $statement = "SELECT * FROM paintings WHERE artist = '$selection'";
            //Table
            include_once('paintings_table.php');
            ?>
        </div>
    </body>
</html>
