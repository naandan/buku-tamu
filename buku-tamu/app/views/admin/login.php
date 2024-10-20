<?php 
session_start();
if(isset($_SESSION['login'])){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin | Login</title>
    <meta name="theme-color" content="#ffffff" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="/public/vendor/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="/public/vendor/css/vendors/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="/public/vendor/css/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css" />
    <link href="/public/vendor/css/examples.css" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
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
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
      <?php if(isset($_SESSION['validate'])): ?>
        <div class="col-lg-8 m-auto">
          <div class="alert alert-<?= $_SESSION['color'] ?> alert-dismissible fade show" role="alert">
            <div class="fw-semibold"><?= $_SESSION['validate'] ?></div>
            <button class="btn-close" type="button" data-coreui-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; unset($_SESSION['validate'], $_SESSION['color']) ?>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                  <h1>Login</h1>
                  <p class="text-medium-emphasis">Sign In to your account</p>
                  <form action="validate.php" method="POST">
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-user"></use>
                          </svg>
                    </span>
                      <input class="form-control" type="text" placeholder="Username" name="username" />
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="/public/vendor/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                          </svg>
                        </span>
                      <input class="form-control" type="password" placeholder="Password" name="password"/>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <button class="btn btn-primary px-4" name="submit" type="submit">Login</button>
                      </div>
                      <div class="col-6 text-end"></div>
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
    <script src="/public/vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="/public/vendor/simplebar/js/simplebar.min.js"></script>
    <script></script>
  </body>
</html>
