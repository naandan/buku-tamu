<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin | Login</title>
    <link rel="manifest" href="assets/favicon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendor/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="vendor/css/vendor/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="vendor/css/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css" />
    <link href="vendor/css/examples.css" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Sign In to your account</p>
                  <form action="/login" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="vendor/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                      </span>
                      <input class="form-control" type="text" placeholder="Username" name="username" />
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="vendor/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                        </svg>
                      </span>
                      <input class="form-control" type="password" placeholder="Password" name="password"/>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <button class="btn btn-primary px-4" name="submit" type="submit">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card col-md-5 bg-primary">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="vendor/simplebar/js/simplebar.min.js"></script>
    <script></script>
  </body>
</html>
