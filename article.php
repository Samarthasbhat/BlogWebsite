<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php

// Check if the admin is already logged in, if yes then redirect him to home page
if (!$loggedin) {
    header("location: index.php");
    exit;
}

// Get all Articles Data
$stmt = $conn->prepare("SELECT * FROM article, author, category WHERE id_categorie = category_id AND author_id = id_author ORDER BY article_id DESC");
$stmt->execute();
$data = $stmt->fetchAll();

?>

<!-- Custom CSS -->
<!-- <link href="css/home.css" rel="stylesheet"> -->
<link type="text/css" rel="stylesheet" href="css/style.css" />

<title>Add Article</title>
<style>
.art{
    color:#d4aa15;
}

.jumbotron{
    background:#0a191a;
}

.thead-color{
    background-color:#031526;
    color:#93aec7;
}

th {
  text-align: center;
}

</style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <?php include "assest/header.php" ?>
    <!-- </Header> -->

    <!-- Main -->
    <main class="main">

        <div class="jumbotron text-center mb-0">
            <h1 class="display-2 art">Articles</h1>
        </div>

        <div class="bg-white p-4">

            <div class="row ">

                <div class="col-lg-12 text-right mb-3 ">
                    <!-- <a class="btn btn-info" href="add_article.php" >Add Article</a> -->
                    <a href="add_article.php"><i class="btn bttn-info  fa-regular fa-plus" > Articles</i></a>
                </div>

            </div>

            <div class="row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-color'>
                        <tr>
                            <!-- <th scope='col'>ID</th> -->
                            <th scope='col'>Title</th>
                            <th scope='col'>Content</th>
                            <th scope='col'>Image</th>
                            <!-- <th scope='col'>Created Time</th> -->
                            <th scope='col'>Category</th>
                            <th scope='col'>Author</th>
                            <th scope='col' colspan="3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($data as $row) :
                            echo "<tr>";
                            ?>

                            <!-- <td><?= $row['article_id'] ?></td> -->
                            <td><?= $row['article_title'] ?></td>
                            <td class="text-break"><?= strip_tags(substr($row['article_content'], 0, 40)) . "..." ?></td>
                            <td><img src="img/article/<?= $row['article_image'] ?>" style="width: 100px; height: auto;"></td>
                            <!-- <td><?= $row['article_created_time'] ?></td> -->
                            <td><?= $row['category_name'] ?></td>
                            <td><?= $row['author_fullname'] ?></td>

                            <td>
                                <a class="btn btn-info" href="single_article.php?id=<?= $row['article_id'] ?> ">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="update_article.php?id=<?= $row['article_id'] ?> ">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="assest/delete.php?type=article&id=<?= $row['article_id'] ?> ">
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