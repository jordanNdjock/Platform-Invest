<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
     Link Platform/{{ __("Réinitialiser son mot de passe") }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
    <div class="position-absolute w-100 h-100 top-0" style="background-image: url('https://cdn.pixabay.com/photo/2022/08/25/17/18/sunset-7410852_1280.jpg'); background-position-y: 50%; background-size: cover;">
        <span class="mask bg-primary opacity-6"></span>
      </div>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                {{ __("Platform") }}
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    {{ __("Accueil") }}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{ route('register') }}">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    {{ __("S'inscrire") }}
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2 active" href="{{ route('login') }}">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    {{ __("Se connecter") }}
                  </a>
                </li>
              </ul>
              <ul class="mx-3 navbar-nav d-lg-block">
                <li class="nav-item">
                   <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __("Langue") }}
                    </button>
                    <ul class="dropdown-menu " style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 40px, 0px);" data-popper-placement="bottom-start">
                      <li><a class="dropdown-item" href="locale/fr">{{ __("Francais") }}</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="locale/en">{{ __("Anglais") }}</a></li>
                    </ul>
                  </div> 
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card ">
                            <div class="card-header pb-0 text-center">
                              <h4 class="font-weight-bolder">{{ __("Modifier son mot de passe") }}</h4>
                            </div>
                            <div class="card-body bg-white">
                              <form role="form" action="{{ route('modify') }}" method="POST">
                              @csrf
                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show text-white fw-bold" role="alert">
                                        {{ __(Session::get('error')) }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i></button>
                                    </div>
                                @endif

                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show text-white fw-bold" role="alert">
                                        {{ __(Session::get('success')) }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i></button>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="{{ __("Mot de passe") }} " value="{{old('password')}}" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control form-control-lg" name="passwordC" placeholder="{{ __("Confirmer son mot de passe") }} "  value="{{old('passwordC')}}" required>
                                </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-secondary btn-lg w-100 mt-4 mb-0">{{ __("Modifier") }} <i class="fas fa-pen text-sm"></i></button>
                                    </div>
                              </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1"></div>
                          </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>