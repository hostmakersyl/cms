<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="jumbotron edit-jumbotorn">
        <h4>Blog Search</h4>

        <form action="search.php" method="post">
            <div class="input-group mb-4">
                <input name="search" type="text" class="form-control" placeholder="Search Hear" aria-label="Search Hear"
                       aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button name="submit" class="btn btn-outline-secondary" type="submit" id="button-addon2">Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- /.input-group -->


    <!-- Blog Categories Well -->
    <div class="edit-jumbotorn">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    $categoryQuery = "SELECT * FROM categorys LIMIT 4";
                    $categoryResult = mysqli_query($connection, $categoryQuery);
                    while ($row = mysqli_fetch_assoc($categoryResult)) {
                        $categoryTitle = $row['cat_title'];
                        ?>

                        <li><a href="#"><?php echo $categoryTitle; ?></a></li>
                    <?php } ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    $categoryNextQuery = "SELECT * FROM categorys LIMIT 4,4 ";
                    $categoryNextResult = mysqli_query($connection, $categoryNextQuery);
                    while ($rowNext = mysqli_fetch_assoc($categoryNextResult)) {
                        $categoryNextTitle = $rowNext['cat_title'];
                        ?>

                        <li><a href="#"><?php echo $categoryNextTitle; ?></a></li>
                    <?php } ?>


                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include("includes/sidebar_widget.php"); ?>

</div>