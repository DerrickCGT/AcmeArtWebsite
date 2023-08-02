<?php
include_once('connect.php');
$ID = 3;
$statement = "SELECT * FROM paintings";
$result = (connect()->query($statement));
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php   
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Paintings - AT2</title>
    </head>
    <body>
        <?php
        include_once('navbar.php');
        foreach ($rows as $row) {
            if ($row['id'] == $ID) {
                ?>
                <div class="container-fluid">
                    <!-- Heading. -->
                    <h2>ADD...</h2>
                    <h2>
                        <tr><td><?php echo $row['title']; ?></td></tr>
                    </h2>
                    <!-- Accordion. --> 
                    <div class="accordion" id="accordionExample">
                        <!-- Description. --> 
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Description</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <?php
                                            echo '<tr>';
                                            echo '<td>' . $row['id'] . '</td>'; 
                                            echo '<td>' . $row['title'] . '</td>';
                                            echo '<td>' . $row['finished'] . '</td>';
                                            echo '<td>' .
                                            '<img src = "data:image/gif;base64,' . base64_encode($row['thumbnail']) . '" width = "50px" height = "50px"/>'
                                            . '</td>';
                                            echo '</tr>';                                        
                                        ?>
                                </div>
                            </div>
                        </div>
                        <!-- Answer. --> 
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Answer</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <tr><td><?php echo $row['Answer']; ?></td></tr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    include_once('footer.php');
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>
