<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Platform Link/{{ __("Tableau de Bord") }}/{{ __("Profil") }}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold h4">Link</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav ">
        <li class="nav-item my-2">
          <a class="nav-link " href="{{route('dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{ __("Tableau de Bord") }}</span>
          </a>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link " href="{{route('action')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-money-bill-transfer text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{ __("Faire une action") }}</span>
          </a>
        </li>
  
        <li class="nav-item my-2">
          <a class="nav-link " href="{{route('mining')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              
              <i class="fas fa-hammer text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{ __("Miner") }}</span>
          </a>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link active" href="{{route('profil')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{ __("Profil") }}</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
      @include('pages.partials.menu')
    <!-- End Navbar -->
    
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
          @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                  {{ __(Session::get('success'))}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i></button>
            </div>
          @endif
          @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
              {{ __(Session::get('error'))}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i></button>
            </div>
          @endif
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/profil.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{ Auth::user()->name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                {{ __("Utilisateur") }} {{ $user->statut }}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">Application</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Messages</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-settings-gear-65"></i>
                    <span class="ms-2">{{ __("Paramètres") }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">{{ __("Modification de Profil") }}</p>
              </div>
            </div>
            <div class="card-body">
                  <p class="text-uppercase text-sm">{{ __("Information de l'utilisateur") }}</p>
                <form action="{{route('profil')}}" method="post">
                    @csrf
                  <div class="row">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">{{ __("Nom") }}</label>
                        <input class="form-control" type="text" value="{{$user->name}}" name="nom">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Email</label>
                        <input class="form-control" value="{{$user->email}}"  readonly >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">{{ __("N° CNI") }}</label>
                        <input class="form-control" type="text" value="{{$user->cni}}" name="cni">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">{{ __("Mot de passe") }}</label>
                        <input class="form-control" type="password" placeholder="********" name="password">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">{{ __("Code d'invitation") }}</label>
                        <div class="input-group">
                          <input class="form-control" type="text" id="link" value="{{ $user->code_invitation }}" readonly style="width: 10px;"> 
                          <span class="btn btn-secondary mt-4 input-group-text btn-copy" id="buttonCopy"> {{ __("Copier") }} <i class="fas fa-clipboard"></i></span>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-md col-5 m-auto">{{ __("Modifier") }} <i class="fas fa-pen-to-square"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        {{-- Footer --}}
          <hr>
          @include('pages.partials.footer')
        {{-- endFooter --}}
      </div>
    </div>
  </div>
    {{-- Sidebar --}}

    @include('pages.partials.sidebar')

    {{-- End Sidebar --}}
   
  </div>
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
  <script type="text/javaScript">
       var button = document.getElementById("buttonCopy");
       button.addEventListener('click', () => {
            var text = document.getElementById("link").value;
            navigator.clipboard.writeText(text);
            button.innerText = "Ok !";
      });
      
  </script>
</body>

</html>