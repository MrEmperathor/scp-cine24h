<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Linsk</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/datos.js"></script>
    <style>
        .accordion.accordion-3 {
            border-radius: 3px; }
        .accordion.accordion-3 p {
            font-size: 1rem; }
        .accordion.accordion-3 .fa.fa-angle-down {
            margin-top: -10px; }

        .accordion .animated-icon1 span {
            background: #F44336;
        }
        .purple-border textarea {
            border: 1px solid #ba68c8;
        }
        .purple-border .form-control:focus {
            border: 1px solid #ba68c8;
            box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
        }

        .green-border-focus .form-control:focus {
            border: 1px solid #8bc34a;
            box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);
        }
    </style>
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                    <strong class="blue-text">MDB</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/"
                                target="_blank">About MDB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect"
                                href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                                target="_blank">Free download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/"
                                target="_blank">Free tutorials</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect"
                                target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/mdbootstrap/bootstrap-material-design"
                                class="nav-link border border-light rounded waves-effect" target="_blank">
                                <i class="fab fa-github mr-2"></i>MDB GitHub
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->