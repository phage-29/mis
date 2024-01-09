<?php
$page = "Meetings";
?>
<!-- ======= Header ======= -->
<?php require_once "assets/components/templates/header.php" ?>

<!-- ======= Topbar ======= -->
<?php require_once "assets/components/templates/topbar.php" ?>

<!-- ======= Sidebar ======= -->
<?php require_once "assets/components/templates/sidebar.php" ?>

<!-- ======= Main ======= -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $page ?></h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form</h5>

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Requests</h5>

                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once "assets/components/templates/footer.php" ?>