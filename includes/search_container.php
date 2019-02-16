<div class="col-md-8">

    <h1 class="page-link heading-top ">
        Page Heading
        <small>Secondary Text</small>
    </h1>

    <hr>

    <!-- First Blog Post -->

    <?php
    if (isset($_POST['submit'])) {
        $serach = $_POST['search'];

        $querySearch = "SELECT * FROM posts WHERE post_tags LIKE '%$serach%' OR post_content LIKE '%$serach%'";
        $searchResult = mysqli_query($connection, $querySearch);


        $count = mysqli_num_rows($searchResult);
        if ($count == 0) {
            echo "<h1> No Result </h1>";
        } else {
            while ($row = mysqli_fetch_assoc($searchResult)) {
                $postTitle = $row['post_title'];
                $postAuthor = $row['post_author'];
                $postUser = $row['post_user'];
                $postDate = $row['post_date'];
                $postImage = $row['post_image'];
                $postContent = $row['post_content'];
                $postTags = $row['post_tags'];
                $postCommentCount = $row['post_comment_count'];
                $postStatus = $row['post_status'];
                $postViewsCount = $row['post_views_count'];
                ?>
                <h2>
                    <a href="#"><?php echo $postTitle; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Date : <?php echo $postDate; ?></p>
                <hr>
                <img class="img-fluid" src="images/<?php echo $postImage; ?>" alt="">
                <hr>
                <p>
                    <?php echo $postContent; ?>
                </p>
                <a class="btn btn-primary" href="#">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php } ?>
        <?php }
    }
    ?>


    <!-- Second Blog Post -->
    <hr>

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>