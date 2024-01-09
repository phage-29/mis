<?php
$page = "Login";
?>
<!-- ======= Header ======= -->
<?php require_once "assets/components/templates/header.php" ?>

<!-- ======= Main ======= -->
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <span class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-block"><?= $website ?></span>
              </span>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 ajax-form">

                  <div class="col-12">
                    <label for="Username" class="form-label">Username</label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-check"></i></span>
                      <input type="text" name="Username" class="form-control" id="Username" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                      <input type="password" name="Password" class="form-control" id="Password" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="showPwd" onclick="Password.type=Password.type=='password'?'text':'password'">
                      <label class="form-check-label" for="showPwd">Show Password</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <input type="hidden" name="Login" />
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="#">Someone</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once "assets/components/templates/footer.php" ?>