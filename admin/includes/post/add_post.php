<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <?php require "includes/navbar/admin_side_navbar.php"; ?>
    <!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col py-3">
        <?php

        $outputImageError = "";
        $outputImageSuc = "";
        // Check if image file is a actual image or fake image
        if (isset($_POST["addPost"])) {
            $postCategoryId = $_POST['categorySelect'];
            $postTitle = mysqli_real_escape_string($connection, $_POST['postTitle']);
            $postAuthor = mysqli_real_escape_string($connection, $_POST['postAuthor']);
            $postContent = mysqli_real_escape_string($connection, $_POST['postContent']);
            $postTags = mysqli_real_escape_string($connection, $_POST['postTags']);
            $postImage = $_FILES["postImage"]["name"];


            $target_dir = "images/";
            $target_file = $target_dir . basename($postImage);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (empty($_FILES["postImage"]["tmp_name"])) {
                $outputImageError .= "You did not select any image.";
            } else {
                $check = getimagesize($_FILES["postImage"]["tmp_name"]);
                if ($check !== false) {
                    $outputImageError .= "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $outputImageError = "File is not an image.";
                    $uploadOk = 0;
                }
            }


            // Check if file already exists
            if (file_exists($target_file)) {
                $outputImageError .= "Sorry, file already exists.";
                $uploadOk = 0;
            }            // Check file size
            elseif ($_FILES["postImage"]["size"] > 50000000) {
                $outputImageError .= "Sorry, your file is too large.";
                $uploadOk = 0;
            } // Allow certain file formats
            elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $outputImageError .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            } // Check if $uploadOk is set to 0 by an error
            elseif ($uploadOk == 0) {
                $outputImageError .= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                $uploadImageOk = move_uploaded_file($_FILES["postImage"]["tmp_name"], $target_file);
                if ($uploadImageOk) {
                    $outputImageSuc = "The file " . basename($_FILES["postImage"]["name"]) . " has been uploaded.";
                } else {
                    $outputImageError .= "Sorry, there was an error uploading your file.";
                }
            }
            if (empty($postTitle) || $postTitle == "") {
                echo "Title can not be empty";
            } elseif (empty($postAuthor) || $postAuthor == "") {
                echo "Post Author can not be empty";
            } elseif (empty($postContent) || $postContent == "") {
                echo "Content can not be empty";
            } else {
                $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags) VALUES ('$postCategoryId','$postTitle','$postAuthor',now(),'$postImage','$postContent','$postTags')";
                $queryRes = mysqli_query($connection, $query);

                if (!$query) {
                    echo " Data insert Failed " . mysqli_error($connection);
                }
            }
        }


        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($outputImageSuc) {
                echo $outputImageSuc;
            } else {
                echo $outputImageError;
            }
            ?>
            <div class="form-group">
                <label for="categorySelect">Select Category</label>
                <select name="categorySelect" class="form-control" id="categorySelect">
                    <?php
                    $catQuery = "SELECT * FROM categorys";
                    $catQueryRes = mysqli_query($connection, $catQuery);
                    if (!$catQueryRes) {
                        echo " Category Select Failed " . mysqli_error($connection);
                    }
                    while ($row = mysqli_fetch_assoc($catQueryRes)) {
                        $catId = $row['cat_id'];
                        $catTitle = $row['cat_title'];
                        echo "<option value=\" $catId \">$catTitle</option>";

                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input name="postTitle" type="text" class="form-control" id="postTitle" placeholder="Post Title">
            </div>
            <div class="form-group">
                <label for="postAuthor">Post Author</label>
                <input name="postAuthor" type="text" class="form-control" id="postAuthor" placeholder="Author">
            </div>


            <div class="form-group">
                <label for="postImage">Post Image</label>
                <input name="postImage" type="file" class="form-control-file" id="postImage">
            </div>

            <div class="form-group">
                <label for="postContent">Post Content</label>
                <textarea name="postContent" class="form-control" id="postContent" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="postTags">Post Tags</label>
                <select name="postTags" class="form-control" id="postTags">
                    <option>1</option>
                </select>
            </div>
            <button name="addPost" type="submit" class="btn btn-primary">Add Post</button>
        </form>


    </div>
    <!-- Main Col END -->

</div>
<!-- body-row END -->