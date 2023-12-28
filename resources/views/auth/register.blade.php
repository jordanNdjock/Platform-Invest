<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Link Platform/{{ __("S'inscrire") }}
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

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
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
              <i class="fa fa-home opacity-6  me-1"></i>
              {{ __("Accueil") }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              {{ __("S'inscrire") }}
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="{{ route('login') }}">
              <i class="fas fa-user opacity-6  me-1"></i>
              {{ __("Se connecter") }}
            </a>
          </li>
        </ul>
        <ul class="mx-3 navbar-nav d-lg-block">
          <li class="nav-item ">
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
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">{{ __("Bienvenue sur") }} Link Platform !</h1>
            <p class="text-lead text-white"> {{ __("Optimisez vos gains financiers en toute simplicité : créez votre compte sur notre plateforme d'investissement en ligne, la clé de votre réussite !") }} </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h4 class="fw-bold h3">{{ __("S'inscrire") }} <i class="fas fa-user-circle"></i></h4>
            </div>
            <div class="card-body">
                @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show text-white fw-bold" role="alert">
                            {{ __(Session::get('error')) }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i></button>
                        </div>
                @endif

              <form role="form" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" name="nom" placeholder="{{ __("Nom") }}" aria-label="{{ __("Nom") }}" value="{{old('nom')}}" required>
                </div>
                <div class="mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" value="{{old('email')}}" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="num_cni" placeholder="{{ __("N° CNI") }}" aria-label="{{ __("N° CNI") }}" value="{{old('num_cni')}}" required>
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="mot_de_passe"  placeholder="{{ __("Mot de passe") }}" aria-label="{{ __("Mot de passe") }}" value="{{old('mot_de_passe')}}" required>
                </div>
                <div class="form-check form-check-info text-start">
                  <input class="form-check-input" type="checkbox" id="flexCheckDefault" required>
                  <label class="form-check-label" for="flexCheckDefault">
                    {{ __("J'accepte les") }} <a href="#" class="text-dark font-weight-bolder"> {{ __("Termes et conditions") }}</a>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __("S'inscrire") }}</button>
                </div>
                <p class="text-sm mt-3 mb-0"> {{ __("Avez-vous déjà un compte?") }}<a href="{{ route('login') }}" class="text-dark font-weight-bolder"> {{ __("Se connecter") }}</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            {{ __("Tout droits reservés") }} © <script>
              document.write(new Date().getFullYear())
            </script> {{ __("Par") }} {{ __("Platform") }}.
          </p>
        </div>
      </div>
    </div>
  </footer>

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