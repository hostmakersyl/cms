
<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <?php require "includes/navbar/admin_side_navbar.php"; ?>
    <!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col py-3">


        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">User</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">content</th>
                <th scope="col">Tags</th>
                <th scope="col">Comment</th>
                <th scope="col">Status</th>
                <th scope="col">Count</th>
                <th scope="col"><a href=""><i class="fa fa-edit">Edit</i></a></th>
                <th scope="col"><a href=""><i class="fa fa-trash">Delete</i> </a></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM posts";
            $postQuery = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($postQuery)) {
                $postId = $row['post_id'];
                $postCategoryId = $row['post_category_id'];
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

                $postContentTenWord = implode(' ', array_slice(explode(' ', $postContent), 0, 5));

                echo " 
            <tr>
                <th scope=\"row\">$postId</th>
                <td>$postCategoryId</td>
                <td>$postTitle</td>
                <td>$postAuthor</td>
                <td>$postUser</td>
                <td>$postDate</td>
                <td><img src=\"\$postImage\" class=\"img-fluid\" alt=\"Responsive image\"></td>
                <td> $postContentTenWord</td>
                <td>$postCommentCount</td>
                <td>$postStatus</td>
                <td>$postViewsCount</td>
                <td><a href=\"\"><i class=\"fa-calendar\"></i> </a> </td>
                <th scope=\"col\"><a href=\"\"><i class=\"fa fa-edit\"></i></a></th>

                <th scope=\"col\"><a href=\"\"><i class=\"fa fa-trash\"></i> </a> </th>
            </tr>                
                
                ";

            }

            ?>

            </tbody>
        </table>


    </div>



</div>
<!-- Main Col END -->

</div>
<!-- body-row END -->

