<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ESMOD SchoolManagement</title>
    <link rel="icon" type="image/png" sizes="126x126" href="{{ asset('img/logo.jpg') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- <!-- Ionicons -->
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
     --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/collection/components/icon/icon.min.css">
    <!-- Morris chart -->
    <link href="{{ asset('css/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('css/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="{{ asset('css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('css/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .img {
            width: 40px;
            height: 35px;
        }

        * {
            font-family: "Comic Sans MS", cursive;
        }
        ion-icon{
            font-size: 17px;
            margin-right: 10px;
        }
        .header-background {
            background-image: url('{{ asset('img/esmodRecu.JPG') }}'); /* Remplacez par le chemin de votre image */
            background-size: cover; /* Ajuste l'image pour couvrir l'élément */
            background-position: center; /* Centre l'image */
            color: white; /* Change la couleur du texte si nécessaire */
            height: 100px; /* Ajustez la hauteur selon vos besoins */
        }
        .header-background2{
    background-image: url('{{ asset('img/esmodLogo.JPG') }}'); /* Remplacez par le chemin de votre image */
    background-size:60%;  /*Ajuste l'image pour couvrir l'élément */
    background-position: center; /* Centre l'image */
    background-repeat:no-repeat;

    /*color: white;  Change la couleur du texte si nécessaire */
    height: 100px; /* Ajustez la hauteur selon vos besoins */
}
.tableau-violet {
    border-collapse: collapse; /* Pour fusionner les bordures */
    width: 100%; /* Ajustez selon vos besoins */
}

.tableau-violet th, .tableau-violet td {
    border: 1px solid dodgerblue; /* Bordure de 2 pixels en violet */
    padding: 8px; /* Espacement interne */
    text-align: left; /* Alignement du texte */
}

.tableau-violet th {
    background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
}
.tfoot{
    height: 15vh;
}
tr .text-center{
    text-align: center;
    font-weight: 500;
}
.bg1,.bg2,.bg3,.bg4{
    color: aliceblue
}
.bg1{
    background-color: orange
}
.bg2{
    background-color: rgb(235, 72, 72)
}.bg3{
    background-color: rgb(94, 94, 196)
}.bg4{
    background-color: dodgerblue
}
.header-background img{
    background-size: cover; /* Ajuste l'image pour couvrir l'élément */
    background-position: center; /* Centre l'image */
    color: white; /* Change la couleur du texte si nécessaire */
    height: 100px; /* Ajustez la hauteur selon vos besoins */
}
@media print {
    #printButton {
        display: none;
    }
    /* Conserver le style des autres éléments */

        .header-background {
        background-image: url('{{ asset('img/esmodRecu.JPG') }}'); /* Remplacez par le chemin de votre image */
        background-size: cover; /* Ajuste l'image pour couvrir l'élément */
        background-position: center; /* Centre l'image */
        color: white; /* Change la couleur du texte si nécessaire */
        height: 100px; /* Ajustez la hauteur selon vos besoins */
    }
    .tableau-violet {
        border-collapse: collapse; /* Pour fusionner les bordures */
        width: 100%; /* Ajustez selon vos besoins */
    }

    .tableau-violet th, .tableau-violet td {
        border: 1px solid dodgerblue; /* Bordure de 2 pixels en violet */
        padding: 8px; /* Espacement interne */
        text-align: left; /* Alignement du texte */
    }

    .tableau-violet th {
        background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
    }
    .tfoot{
        height: 15vh;
    }
    tr .text-center{
        text-align: center;
        font-weight: 500;
    }
    .bg1,.bg2,.bg3,.bg4{
        color: aliceblue
    }
    .bg1{
        background-color: orange
    }
    .bg2{
        background-color: rgb(235, 72, 72)
    }.bg3{
        background-color: rgb(94, 94, 196)
    }.bg4{
        background-color: dodgerblue
    }
}
    </style>
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="{{ url('/') }}" class="logo">
            ESMOD
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top st-red" role="navigation" style="color:white;opacity: 1">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span>{{ session('user')->nom }}<i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li class="dropdown-header text-center">Account</li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('utilisateur.show', session('user')->id) }}"><i class="fa fa-user pull-right"></i>Mon profil</a>
                            </li>
                            <li>
                                <a href="{{ route('logoutPage') }}"><i class="fa fa-ban fa-fw pull-right"></i> Deconexion</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas " style="background: #dc3545;">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left info">
                        <p>Salut, {{ session('user')->nom }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> connecter</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    {{-- @include("menu") --}}
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <ion-icon name="logo-microsoft"></ion-icon> <span>Dashboard</span>
                        </a>
                    </li>

                    @if(session('user')->role == "Administrateur")
                        <li class="{{ request()->routeIs('utilisateur','utilisateurAdd','utilisateur.edit') ? 'active' : '' }}">
                            <a href="{{ route('utilisateur') }}">
                                <ion-icon name="people"></ion-icon> <span>Utilisateurs</span>
                            </a>
                        </li>
                    @endif

                    <li class="{{ request()->routeIs('etudiant') ? 'active' : '' }}">
                        <a href="{{ route('etudiant') }}">
                            <ion-icon name="school"></ion-icon> <span>Etudiants</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('specialite','specialiteAdd','specialite.edit') ? 'active' : '' }}">
                        <a href="{{ route('specialite') }}">
                            <ion-icon name="sparkles"></ion-icon> <span>Specialités</span>
                        </a>
                    </li>

                    @if(session('user')->role == "Administrateur")
                        <li class="{{ request()->routeIs('campus','campusAdd','campus.edit') ? 'active' : '' }}">
                            <a href="{{ route('campus') }}">
                                <ion-icon name="school"></ion-icon> <span>Campus</span>
                            </a>
                        </li>
                    @endif

                    <li class="{{ request()->routeIs('versement') ? 'active' : '' }}">
                        <a href="{{ route('versement') }}">
                            <ion-icon name="pricetags"></ion-icon> <span>Versement</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('liste') ? 'active' : '' }}">
                        <a href="{{ route('liste') }}">
                            <ion-icon name="list"></ion-icon> <span>Liste</span>
                        </a>
                    </li>
                </ul>

            </section>
            <!-- /.sidebar -->
        </aside>

        <aside class="right-side">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
                {{-- <script>
                    alert('{{ session('success') }}');
                </script> --}}
            @endif

            <section class="content">
                @yield('content')
            </section>
        </aside>
    </div>

    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="{{ asset('js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/chart.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
    <!-- calendar -->
    <script src="{{ asset('js/plugins/fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>
    <!-- Director App -->
    <script src="{{ asset('js/Director/app.js') }}" type="text/javascript"></script>
    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/Director/dashboard.js') }}" type="text/javascript"></script>
    <!-- Director for demo purposes -->
    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function(event) {
            $(this).parents('li').removeClass("task-done");
            console.log('not');
        });
    </script>
    <script>
        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            //BAR CHART
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                responsive: true,
                maintainAspectRatio: false,
            });
        });
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/recherche.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
