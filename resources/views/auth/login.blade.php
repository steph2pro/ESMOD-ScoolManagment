<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ESMOD Connexion</title>
    <link rel="icon" type="image/png" sizes="126x126" href="{{ asset('imgs/logo.png') }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.0.1') }}" rel="stylesheet" />



</head>

<body class="">
    <div class="position-absolute z-index-sticky p-4 d-flex">
        <img src="{{ asset('imgs/logo.png') }}" alt="logo" class="w-5">
        <h3>ESMOD SchoolManagement</h3>
    </div>
    <!-- <div class="container position-sticky z-index-sticky top-0">
        <div class="row">

        </div>
    </div> -->

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">
                                        connectez vous
                                    </h4>
                                    <p class="mb-0">Entrez votre email et votre mot de passe</p>
                                </div>
                                <div class="card-body">
                                    <div class="container mt-15">
                                        <h2>
                                            Connexion
                                        </h2>
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <input type="email" id="email" name="email" required class="form-control form-control-lg"
                                                    placeholder="Email" aria-label="Email">
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" id="password" name="password" required class="form-control form-control-lg"
                                                    placeholder="Mot de Passe" aria-label="Password">
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Rappelle toi de moi</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" name="login"
                                                    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">connexion</button>
                                            </div>
                                        </form>
                                    </div>









                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-assets/img/signin-ill.jpg');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Connectez vous à la
                                    meilleure application web de gestion scolaire"</h4>
                                <p class="text-white position-relative">Avec ESMOD SchoolManagement vos gestions sont mieux en
                                    sécurité que sur du papier donc connectez vous et faites nous confiance. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/argon-dashboard.min.js?v=2.0.1') }}"></script>
</body>

</html>
