<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <a class="navbar-brand" href="admin/index.php">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="myNavbar">
            <?php
            $categoryQuery = "SELECT * FROM categorys";
            $categoryResult = mysqli_query($connection, $categoryQuery);
            while ($row = mysqli_fetch_assoc($categoryResult)) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php echo $row['cat_title']; ?> <span
                                class="sr-only">(current)</span></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>


</nav>


<!--Active class added in navbar by javascript-->
<script>
    // Get the container element
    var btnContainer = document.getElementById("myNavbar");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("nav-item");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");

            // If there's no active class
            if (current.length > 0) {
                current[0].className = current[0].className.replace(" active", "");
            }

            // Add the active class to the current/clicked button
            this.className += " active";
        });
    }

</script>