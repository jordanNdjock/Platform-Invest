@php
   $couleurs = [
        'bg-gradient-dark',
        'bg-gradient-primary',
        'bg-gradient-info',
        'bg-gradient-warning',
        'bg-gradient-danger',
        'bg-gradient-success',
    ];
    $couleurs = array_reverse($couleurs);
    $i = 1;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Platform Link/{{ __("Tableau de Bord") }}/{{ __("Miner") }}
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

<body class="g-sidenav-show  bg-gray-100 ">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://cdn.pixabay.com/photo/2015/03/11/12/31/buildings-668616_1280.jpg'); background-position-y: 50%;">
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
          <a class="nav-link active" href="{{route('mining')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              
              <i class="fas fa-hammer text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{ __("Miner") }}</span>
          </a>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link " href="{{route('profil')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">{{ __("Profil") }}</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
        @include('pages.partials.menu')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-xl-12">
              <div class="row py-3">
                @foreach ($bots as $bot => $donnees)

                        <div class="col-md-3 mx-auto mb-3">
                            <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg {{ $couleurs[count($bots)-$i] }} shadow text-center" style="border-radius:50%;">
                                <i class="fas fa-robot opacity-10 " style="font-size: 25px"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">{{ $donnees->nom }}</h6>
                                <span class="text-xs">{{ __("Coût d'achat du robot de minage") }}</span>
                                <h5 class="mb-3 mt-2">{{ $donnees->cout }} XAF</h5>
                                <hr class="horizontal dark my-3">
                                <span class="text-xs">{{ __("Montant fourni par jour") }}</span>
                                <h5 class="mb-3 mt-2">{{ $donnees->montant_fourni }} XAF</h5>
                                <button type="submit" class="btn btn-lg mx-auto {{ $couleurs[count($bots)-$i] }}">{{ __("Miner") }} <i class="fas fa-hammer text-sm"></i></button><!--<i class="fas fa-cart-shopping text-sm"></i> -->
                            </div>
                            </div>
                        </div>
                  @php
                    $i++;
                  @endphp
                @endforeach
                
              </div>
            </div>
            
            </div>
          </div>
          </div>
    
      {{-- Footer --}}

        @include('pages.partials.footer')
      
      {{-- End Footer --}}
    </div>
  </main>
  
    {{-- Sidebar --}}

    @include('pages.partials.sidebar')

    {{-- End Sidebar --}}

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