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
    <script src="../jsAdmin/index.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap"
        rel="stylesheet" />
</head>

<body>

    <!------------- Section header------------->
    <section class="header-fixed-top">
        <div class="header-container row fixed-top navbar">
            <header
                class="header w-100 ps-5 pe-5 navbar navbar-expand-sm expand-header d-flex">
                <div class="col-4 header-left-dashboard d-flex">
                    <input type="checkbox" id="toggle" class="d-none">
                    <label for="toggle" class="side-toggle mt-1">
                        <span id="menu-toggle" class="fa fa-bars me-3"></span>
                    </label>
                    <h4>Dashboard</h4>
                </div>
                <div
                    class="col-4 header-middle_logo d-flex justify-content-center ps-5 ms-5">
                    <div class="logo me-5 pe-5">
                        <a href="../../html/index.html"><img class="ps-5 ms-3" style="width:70%; height:auto;" src="../../image/logo.png" alt="logo" /></a>
                    </div>
                </div>
                <div
                    class="col-4 header-right_user pe-5 me-5 d-flex justify-content-end d-flex">
                    <i class="fa fa-user me-2 pt-1"></i>
                    <p>Công Thạch</p>
                </div>
            </header>
        </div>
    </section>