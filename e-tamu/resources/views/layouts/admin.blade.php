<!DOCTYPE html>
<html lang="id">
  <head>
    <base href="./" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin | Data</title>
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <link href="{{ asset('vendor/sbadmin2/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/simplebar/css/simplebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/vendors/simplebar.css') }}" />
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css" />
    <link href="{{ asset('vendor/css/examples.css') }}" rel="stylesheet" />
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <link href="{{ asset('vendor/sbadmin2/sb-admin-2.css') }}" rel="stylesheet">
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      // Shared ID
      gtag("config", "UA-118965717-3");
      // Bootstrap ID
      gtag("config", "UA-118965717-5");
    </script>
    <link href="{{ asset('vendor/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <h5 class="mt-2">Buku Tamu K-ONE</h5>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('vendor/@coreui/icons/svg/free.svg#cil-home') }}"></use>
            </svg>
            Home
          </a>
          <a class="nav-link" href="{{ route('admin_data') }}">
            <svg class="nav-icon">
              <use xlink:href="{{ asset('vendor/@coreui/icons/svg/free.svg#cil-chart') }}"></use>
            </svg>
            Data Tamu
          </a>
        </li>
      </ul>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="{{ asset('vendor/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
          </button>
          <a class="header-brand d-md-none">
            <h5 class="mt-2">Buku Tamu K-ONE</h5>
          </a>
          <div class="d-none d-md-flex">
            <h3>Selamat datang, Admin!</h3>
          </div>
          <ul class="header-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('img/user.png') }}" alt="user@email.com" /></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <svg class="icon me-2">
                      <use xlink:href="{{ asset('vendor/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                    </svg>
                    Logout
                  </button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </header>
      @yield('contents')
      <footer class="footer">
        <div>© 2023 K-ONE WEB.</div>
      </footer>
    </div>
    <script>
      const dmy = document.querySelector('#dmy');
      if (dmy) {
        dmy.addEventListener('change', () => {
          dmy.nextElementSibling.click();
        });
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/sbadmin2/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/sbadmin2/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/sbadmin2/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('vendor/sbadmin2/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/sbadmin2/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/sbadmin2/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('vendor/sbadmin2/datatables-demo.js') }}"></script>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendor/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('vendor/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('vendor/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('vendor/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
  </body>
</html>
