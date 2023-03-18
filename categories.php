<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php

// Check if the admin is already logged in, if yes then redirect him to home page
if (!$loggedin) {
    header("location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM category");
$stmt->execute();
$categories = $stmt->fetchAll();

?>
<style>
    .art{
    color:#fff;
}

.jumbotron{
    background:#050a24;
}

.thead-color{
    background-color:#5362a6;
    color:black;
}

th {
  text-align: center;
}

</style>
<title>All Categories</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body class="d-flex flex-column min-vh-100">


    <!-- Header -->
    <?php include "assest/header.php" ?>

    <!-- Main -->
    <main role="main" class="main">

        <div class="jumbotron text-center mb-0">
            <h1 class="display-2 font-weight-normal art">Categories</h1>
        </div>

        <div class="bg-white p-4">

            <div class="row">

                <div class="col-lg-12 text-right mb-3">
                <a href="add_category.php"><i class="btn bttn-info  fa-regular fa-plus" > Categories</i></a>
                </div>

            </div>

            <div class="row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-color'>
                        <tr>
                            <!-- <th scope='col'>ID</th> -->
                            <th scope='col'>Name</th>
                            <th scope='col'>Image</th>
                            <th scope='col'>Color</th>
                            <th scope='col' colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($categories as $category) :
                            echo "<tr>";
                            ?>

                            <!-- <td><?= $category['category_id'] ?></td> -->
                            <td><?= $category['category_name'] ?></td>
                            <td>
                                <img src="img/category/<?= empty($category['category_image']) ? "no-image-available.png" : $category['category_image']; ?>" style="width: 100px; height: 60px;">
                            </td>
                            <td class="">
                                <div style="width: 40px; height: 40px; border-radius: 100% ;background-color: <?= $category['category_color'] ?>"></div>
                            </td>

                            <td>
                                <a class="btn btn-success" href="update_category.php?id=<?= $category['category_id'] ?> ">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="assest/delete.php?type=category&id=<?= $category['category_id'] ?> ">
                                    <i class="fa fa-trash " aria-hidden="true"></i>
                                </a>
                            </td>

                        <?php
                            echo "</tr>";
                        endforeach;
                        ?>
                    </tbody>

                </table>
            </div>

        </div>


    </main>

    <!-- Footer -->
    <!-- <?php include "assest/footer.php" ?> -->


</body>

</html>

<script src="https://kit.fontawesome.com/e0d5c6d03b.js" crossorigin="anonymous"></script>
