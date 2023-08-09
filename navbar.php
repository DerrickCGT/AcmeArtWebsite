<nav class="navbar navbar-expand-lg navbar-yellow-green bg-yellow-green">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- Home Page. -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <!-- Show all Paintings. -->
                <li class="nav-item">
                    <a class="nav-link" href="select_all.php">Show all Paintings</a>
                </li>
                <!-- Function for dynamic dropdown elements. -->
                <!-- We can use this method to display list items for all dropdown menu. eg: Style/Artist/..?-->      
                <?php
                include_once('connect.php');

                function dynamic_dropdowns($column, $webpage) {
                    $statement = "SELECT DISTINCT $column FROM paintings";
                    $result = (connect()->query($statement));
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                        ?>
                        <li><a class="dropdown-item" 
                               href=<?php echo "$webpage?TAG=" . urlencode("$row[$column]") ?> 
                               ><?php echo $row[$column]; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                <!-- Paintings by Style. -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Paintings by Style</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php dynamic_dropdowns('style', 'select_by_style.php'); ?>
                    </ul>
                </li>
                <!-- Paintings by Artist. -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Paintings by Artist</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php dynamic_dropdowns('artist', 'select_by_artist.php'); ?>
                    </ul>
                </li>
                <!-- Modify Database. -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Modify Database</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="add_painting.php">Add New Painting</a></li>
                        <li><a class="dropdown-item" href="edit.php">Edit/Delete</a></li>
                    </ul>
                </li>
                <!-- Contact Page. -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="contact.php">Contacts</a>
                </li>
            </ul>
            <!-- Search. -->
            <form class="d-flex" method="GET" action="search.php">
                <input class="form-control me-2" type="search" placeholder="Search Title" aria-label="Search" name="query">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
