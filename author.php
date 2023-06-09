<!-- Include Head -->
<?php include "assest/head.php"; ?>
<?php

// Check if the admin is already logged in, if yes then redirect him to home page
if (!$loggedin) {
    header("location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM author");
$stmt->execute();
$authors = $stmt->fetchAll();
?>

<title>All Author</title>

<link type="text/css" rel="stylesheet" href="css/style.css" />

<style>
    .fa-twitter,
    .fa-github,
    .fa-linkedin-square {
        font-size: 2.3rem;
        
    }

    .fa-linkedin-square{
        color:#0072b1;
    }

    .fa-twitter{
    color:#00acee;
    }

    .fa-github{
    color:#171515;
    }
    .art{
    color:#a69474;
}

.jumbotron{
    background:#1b1f02;
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
    <main role="main" class="main">
        <div class="jumbotron text-center mb-0">
            <h1 class="display-2  art">Authors</h1>
        </div>

        <div class="bg-white py-3 px-5">
            <div class="row">

                <!-- <div class="col-lg-12 text-center mb-3"> -->
                    <!-- <a class="btn btn-info" href="add_author.php">Add Author</a> -->
                <!-- </div> -->

            </div>
            <div class="col-lg-20 text-right mb-3">
            <a href="add_author.php"><i class="btn bttn-info  fa-regular fa-plus" > Author</i></a>
                </div>
            <div class="row">
                <table class='table table-striped table-bordered'>

                    <thead class='thead-color'>
                        <tr>
                            <!-- <th scope='col'>ID</th> -->
                            <th scope='col'>Full Name</th>
                            <th scope='col'>Description</th>
                            <th scope='col'>Avatar</th>
                            <th scope='col'>Email</th>
                            <th scope='col'>Twitter</th>
                            <th scope='col'>Github</th>
                            <th scope='col'>Linkedin</th>
                            <th scope='col' colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($authors as $author) :
                            echo "<tr>";
                            ?>

                            <!-- <td><?= $author['author_id'] ?></td> -->
                            <td><?= $author['author_fullname'] ?></td>
                            <td><?= $author['author_desc'] ?></td>
                            <td>
                                <img src="img/avatar/<?= $author['author_avatar'] ?>" style="width: 100px; height: auto;border-radius: 100%;">
                            </td>
                            <td><?= $author['author_email'] ?></td>
                            <td class="text-center">
                                <a href="https://twitter.com/<?= $author['author_twitter'] ?>" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="https://github.com/<?= $author['author_github'] ?>" target="_blank">
                                    <i class="fa fa-github"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="https://www.linkedin.com/in/<?= $author['author_link'] ?>" target="_blank">
                                    <i class="fa fa-linkedin-square"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-success" href="update_author.php?id=<?= $author['author_id'] ?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="assest/delete.php?type=author&id=<?= $author['author_id'] ?>">
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

    </main><!-- </Main> -->

    <!-- Footer -->
    <!-- <?php include "assest/footer.php" ?> -->

</body>

</html>


<script src="https://kit.fontawesome.com/e0d5c6d03b.js" crossorigin="anonymous"></script>
