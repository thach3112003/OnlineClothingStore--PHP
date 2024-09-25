<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin page using HMTL CSS & JS</title>
    <link rel="stylesheet" href="../css/index.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/index.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap"
        rel="stylesheet" />
</head>


<body>

    <?php include 'header.php'; ?>
    <div class="d-inline-flex w-100">
        <div style="width: 200px;"">
            <?php include 'menu-slider.php'; ?>
            <!-- Content for cartegory -->
        </div>
        <div class=" w-100">
            <main class=" w-100 pe-5 pt-5 mt-5 ps-5">
                <div class="content mt-5">
                    <div class="dashboard-header d-inline-flex">
                        <input class="me-5" type="text" placeholder="Search" name="searchcategoryinput" id="searchcategoryinput" />

                        <select class="btn- btn--hover" name="searchcategoryvalue" id="searchcategoryvalue">
                            <option value="id">Id</option>
                            <option value="name">Name</option>
                        </select>
                    </div>
                    <!-- Product -->
                    <div class="dashboard-body">
                        <table class="table pt-3 mt-4 w-100 table-warning table-striped">
                            <thead>
                                <tr>
                                    <th>ID--</th>
                                    <th>NAME</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

        <script src="../jsAdmin/index.js"></script>
</body>

</html>