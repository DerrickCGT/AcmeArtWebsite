<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Search Painting Title</title>
    </head>
    <body>
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Search Painting Title</h2>
            <?php
            if (isset($_GET['query'])) {
                $search_query = $_GET['query'];

                // Here, you can perform your search logic using the $search_query
                // For example, you could search a database or search through files.
                // Display the search results or perform other actions
                echo "You searched for: <strong class='bold-text'>$search_query</strong> <br>";
                echo "Result: ";

                $statement = "SELECT * FROM paintings WHERE title = '$search_query'";
                //Table
                include_once('search_table.php');
            }
            ?>
        </div>

        <?php
        include_once('footer.php');
        ?>
    </body>
</html>
