<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <?php require "navbar/admin_side_navbar.php"; ?>
    <!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col py-3">

        <form action="category.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php insert_category(); ?>

                        <div class="form-group">
                            <label for="category">Add Category</label>
                            <input type="text" name="category" class="form-control" id="category"
                                   aria-describedby="categoryHelpp" placeholder="Enter Category">
                            <small id="categoryHelp" class="form-text text-muted">Please do not put same category.
                            </small>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit Catecory</button>
        </form>
        <hr>

        <form action="category.php" method="post">

            <?php update_category_form() ?>

        </form>

    </div>


    <!--Col 2 start-->

    <div class="col">
        <table class="table">
            <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>

            </tr>
            </thead>
            <tbody class="text-center">
            <?php find_all_category(); ?>
            </tbody>
        </table>
        <!--// Delete Category-->

        <?php
        delete_category();

        ?>


        <!--/////////Update Category-->
        <?php update_category(); ?>

    </div>
</div>

</div>


</div>
<!-- Main Col END -->

</div>
<!-- body-row END -->
<!--Add Category -->



