<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Home - AT2 Sprint 1</title>
    </head>
    <body>
        <?php
        include_once('navbar.php');
        ?>
        <div class="container-fluid" style="height: 50vh;">

            <div class="d-flex justify-content-center align-items-center" style="height: 45vh;">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images\waterliliesandjapanesebridge.gif" class="d-block" alt="first_one" width="400" height="400">
                        </div>
                        <div class="carousel-item">
                            <img src="images\weaver.gif" class="d-block" alt="second_one" width="400" height="400">
                        </div>
                        <div class="carousel-item">
                            <img src="images\donitondo.gif" class="d-block" alt="third_one" width="400" height="400">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">

                <h2>AT2 Sprint 1 </h2>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="height: 23vh;">

                <p class="lead">
                    Team name: <img src="images\logo.png" class="img-thumbnail" alt="logo" width="80" height="80"> King Rabbit<br>
                    Team Leader: Derrick Choong<br>
                    Team Member #1: Francis Sullivan<br>
                    Team Member #2: Dongyun Huang<br>
                </p>
            </div>

            <?php
            include_once('footer.php');
            ?>
        </div>
    </body>
</html>