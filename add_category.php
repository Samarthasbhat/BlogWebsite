<!-- Include Head -->
<?php include "assest/head.php"; ?>

<title>Add Category</title>

<style>
    .art{
    color:#02e871;
}

.jumbotron{
    background:#0a191a;
}
</style>

</head>

<body class="d-flex flex-column min-vh-100">


    <!-- Header -->
    <?php include "assest/header.php" ?>

    <!-- Main -->
    <main role="main" class="main">

        <div class="jumbotron text-center">
            <h1 class="display-3  art">Submit a Category</h1>
        </div>

        <div class="container">

            <div class="row">

                <div class="col-lg-12 mb-4">
                    <!-- Form -->
                    <form action="assest/insert.php?type=category" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="catName">Category Name</label>
                            <input type="text" class="form-control" name="catName" id="catName" required>
                        </div>

                        <div class="form-group">
                            <label for="catImage">Category Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="catImage" id="catImage" required>
                                <label class="custom-file-label" for="catImage">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catColor">Category Color</label>
                            <input type="color" id="catColor" name="catColor" value="#02e871">
                        </div>


                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-success btn-lg w-25">Submit</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </main>

    <!-- Footer -->
    <!-- <?php include "assest/footer.php" ?> -->


</body>

</html>