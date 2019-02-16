<?php

function insert_category()
{

    global $connection;
    if (isset($_POST['submit'])) {

        $category = mysqli_real_escape_string($connection, $_POST['category']);
        $categoryExist = "SELECT * FROM categorys WHERE (cat_title = '$category')";
        $existCategory = mysqli_query($connection, $categoryExist);
        $rowCount = mysqli_num_rows($existCategory);
        if ($rowCount > 0) {

            echo " You Can not Input Duplicate Category";
        } elseif ($category == "") {
            echo "You can not input black category";
        } else {
            $categoryQuery = "INSERT INTO categorys (cat_title) VALUES ('$category');";
            $addCategory = mysqli_query($connection, $categoryQuery);
            if ($addCategory) {
                echo "<h2>New Category has been added</h2>";
            } else {
                echo "Error : ", $categoryQuery . "<br>" . mysqli_error($connection);
            }
        }
    }

}


function find_all_category()
{
    global $connection;
    $queryCategory = "SELECT * FROM categorys";
    $pullCategory = mysqli_query($connection, $queryCategory);

    if (!$pullCategory) {
        echo " Pulling Category from Database Error " . mysqli_error($connection);
    } else {
        while ($row = mysqli_fetch_assoc($pullCategory)) {
            $catTitle = $row['cat_title'];
            $catId = $row['cat_id'];


            echo "<tr>
            <th scope=\"row\"> $catId </th>
            <td> $catTitle </td>
            <td><a href=\"category.php?cat_id= $catId\"><i class=\"fa fa-trash\"
                                                                        aria-hidden=\"true\"></i></a></td>
            <td><a href=\"category.php?update_id= $catId\"><i class=\"fa fa-edit\"
                                                                           aria-hidden=\"true\"></i></a></td>

        </tr>";


        }
    }


}


function update_category()
{
    global $connection;
    if (isset($_POST['update'])) {
        $update_category = $_POST['updatecategory'];
        $updateCategoryId = $_POST['updateId'];

        $updateQuery = "UPDATE categorys SET cat_title = '$update_category' WHERE cat_id = $updateCategoryId ";
        $updateCategory = mysqli_query($connection, $updateQuery);
        if (!$updateCategory) {
            echo "Update Category Failed " . mysqli_error($connection);
        } else {
//                Below Code showing error..
            header("Location: category.php");
        }

    }
}


function update_category_form()
{
    global $connection;
    if (isset($_GET['update_id'])) {
        $update_id = $_GET['update_id'];
        $updateQuery = "SELECT * FROM categorys WHERE cat_id = {$update_id} ";
        $updateQueryRes = mysqli_query($connection, $updateQuery);
        while ($row = mysqli_fetch_assoc($updateQueryRes)) {
            $updateCategoryName = $row['cat_title'];
            $updateCategoryId = $row['cat_id'];


            echo "<div class=\"form-group\">
                <select name=\"updateId\" class=\"custom-select\">
                    <option selected> $updateCategoryId </option>

                </select>
                <label for=\"category\">Update Category</label>
                <input type=\"text\" value=\" $updateCategoryName; \" name=\"updatecategory\"
                       class=\"form-control\" id=\"updatecategory\"
                       aria-describedby=\"categoryHelpp\" placeholder=\"Update Category\">
                <small id=\"categoryHelp\" class=\"form-text text-muted\">Please Update category.
                </small>


            </div>

            <button type=\"submit\" name=\"update\" class=\"btn btn-primary\">Update Catecory</button>   ";

        }
    }
}


function delete_category(){
    global $connection;
    if (isset($_GET['cat_id'])) {

        $cat_id = $_GET['cat_id'];
        $delQuery = "DELETE FROM categorys WHERE cat_id = $cat_id";
        mysqli_query($connection, $delQuery);
        //                Below Code showing error..
        header("Location: category.php");
    }
}

?>