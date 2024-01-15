<?php
$page = "Profile";
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
    <h1>Profile</h1>
  </div><!-- End Page Title -->
  <?php
  switch ($acc->Role) {
    case 'Admin':
  ?>
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="assets/img/logo.png" alt="Profile">
                <h2><?= $acc->FirstName ?> <?= $acc->LastName ?></h2>
                <h3><?= $acc->Position ?></h3>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">ID Number</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->IDNo ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->FirstName ?> <?= $acc->MiddleName ?> <?= $acc->LastName ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Position</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Position ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Division</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Division ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Client Type</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->ClientType ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->DateOfBirth ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Sex</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Sex ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">PWD</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->PWD ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Address ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Phone ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Email ?></div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="IDNo" class="col-md-4 col-lg-3 col-form-label">ID Number</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="IDNo" type="text" class="form-control" id="IDNo" value="<?= $acc->IDNo ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="FirstName" type="text" class="form-control" id="FirstName" value="<?= $acc->FirstName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="MiddleName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="MiddleName" type="text" class="form-control" id="MiddleName" value="<?= $acc->MiddleName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="LastName" type="text" class="form-control" id="LastName" value="<?= $acc->LastName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Position" type="text" class="form-control" id="Position" value="<?= $acc->Position ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DivisionID" class="col-md-4 col-lg-3 col-form-label">Division</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="DivisionID" class="form-select" id="DivisionID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From divisions');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->DivisionDesc ?>"><?= $row->Division ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#DivisionID").val('<?= $acc->DivisionID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="ClientTypeID" class="col-md-4 col-lg-3 col-form-label">Client Type</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="ClientTypeID" class="form-select" id="ClientTypeID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From clienttypes');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->ClientTypeDesc ?>"><?= $row->ClientType ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#ClientTypeID").val('<?= $acc->ClientTypeID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DateOfBirth" class="col-md-4 col-lg-3 col-form-label">Date Of Birth</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="DateOfBirth" type="date" class="form-control" id="DateOfBirth" value="<?= $acc->DateOfBirth ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="Sex" class="form-select" id="Sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <script>
                            $("#Sex").val('<?= $acc->Sex ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="PWD" class="col-md-4 col-lg-3 col-form-label">PWD</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="PWD" class="form-select" id="PWD">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <script>
                            $("#PWD").val('<?= $acc->PWD ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Address" type="text" class="form-control" id="Address" value="<?= $acc->Address ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Phone" type="text" class="form-control" id="Phone" value="<?= $acc->Phone ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Email" type="email" class="form-control" id="Email" value="<?= $acc->Email ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="UpdateProfile" />
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="CurrentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="CurrentPassword" type="password" class="form-control" id="CurrentPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="NewPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="NewPassword" type="password" class="form-control" id="NewPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="RenewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="RenewPassword" type="password" class="form-control" id="RenewPassword" required />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="ChangePassword" />
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
    <?php
      break;
    case 'Officer':
    ?>
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="assets/img/logo.png" alt="Profile">
                <h2><?= $acc->FirstName ?> <?= $acc->LastName ?></h2>
                <h3><?= $acc->Position ?></h3>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">ID Number</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->IDNo ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->FirstName ?> <?= $acc->MiddleName ?> <?= $acc->LastName ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Position</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Position ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Division</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Division ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Client Type</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->ClientType ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->DateOfBirth ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Sex</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Sex ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">PWD</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->PWD ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Address ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Phone ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Email ?></div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="IDNo" class="col-md-4 col-lg-3 col-form-label">ID Number</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="IDNo" type="text" class="form-control" id="IDNo" value="<?= $acc->IDNo ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="FirstName" type="text" class="form-control" id="FirstName" value="<?= $acc->FirstName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="MiddleName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="MiddleName" type="text" class="form-control" id="MiddleName" value="<?= $acc->MiddleName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="LastName" type="text" class="form-control" id="LastName" value="<?= $acc->LastName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Position" type="text" class="form-control" id="Position" value="<?= $acc->Position ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DivisionID" class="col-md-4 col-lg-3 col-form-label">Division</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="DivisionID" class="form-select" id="DivisionID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From divisions');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->DivisionDesc ?>"><?= $row->Division ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#DivisionID").val('<?= $acc->DivisionID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="ClientTypeID" class="col-md-4 col-lg-3 col-form-label">Client Type</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="ClientTypeID" class="form-select" id="ClientTypeID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From clienttypes');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->ClientTypeDesc ?>"><?= $row->ClientType ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#ClientTypeID").val('<?= $acc->ClientTypeID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DateOfBirth" class="col-md-4 col-lg-3 col-form-label">Date Of Birth</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="DateOfBirth" type="date" class="form-control" id="DateOfBirth" value="<?= $acc->DateOfBirth ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="Sex" class="form-select" id="Sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <script>
                            $("#Sex").val('<?= $acc->Sex ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="PWD" class="col-md-4 col-lg-3 col-form-label">PWD</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="PWD" class="form-select" id="PWD">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <script>
                            $("#PWD").val('<?= $acc->PWD ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Address" type="text" class="form-control" id="Address" value="<?= $acc->Address ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Phone" type="text" class="form-control" id="Phone" value="<?= $acc->Phone ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Email" type="email" class="form-control" id="Email" value="<?= $acc->Email ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="UpdateProfile" />
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="CurrentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="CurrentPassword" type="password" class="form-control" id="CurrentPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="NewPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="NewPassword" type="password" class="form-control" id="NewPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="RenewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="RenewPassword" type="password" class="form-control" id="RenewPassword" required />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="ChangePassword" />
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
    <?php
      break;
    case 'Staff':
    ?>
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="assets/img/logo.png" alt="Profile">
                <h2><?= $acc->FirstName ?> <?= $acc->LastName ?></h2>
                <h3><?= $acc->Position ?></h3>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">ID Number</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->IDNo ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->FirstName ?> <?= $acc->MiddleName ?> <?= $acc->LastName ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Position</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Position ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Division</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Division ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Client Type</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->ClientType ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->DateOfBirth ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Sex</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Sex ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">PWD</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->PWD ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Address ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Phone ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Email ?></div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="IDNo" class="col-md-4 col-lg-3 col-form-label">ID Number</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="IDNo" type="text" class="form-control" id="IDNo" value="<?= $acc->IDNo ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="FirstName" type="text" class="form-control" id="FirstName" value="<?= $acc->FirstName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="MiddleName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="MiddleName" type="text" class="form-control" id="MiddleName" value="<?= $acc->MiddleName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="LastName" type="text" class="form-control" id="LastName" value="<?= $acc->LastName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Position" type="text" class="form-control" id="Position" value="<?= $acc->Position ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DivisionID" class="col-md-4 col-lg-3 col-form-label">Division</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="DivisionID" class="form-select" id="DivisionID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From divisions');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->DivisionDesc ?>"><?= $row->Division ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#DivisionID").val('<?= $acc->DivisionID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="ClientTypeID" class="col-md-4 col-lg-3 col-form-label">Client Type</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="ClientTypeID" class="form-select" id="ClientTypeID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From clienttypes');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->ClientTypeDesc ?>"><?= $row->ClientType ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#ClientTypeID").val('<?= $acc->ClientTypeID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DateOfBirth" class="col-md-4 col-lg-3 col-form-label">Date Of Birth</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="DateOfBirth" type="date" class="form-control" id="DateOfBirth" value="<?= $acc->DateOfBirth ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="Sex" class="form-select" id="Sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <script>
                            $("#Sex").val('<?= $acc->Sex ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="PWD" class="col-md-4 col-lg-3 col-form-label">PWD</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="PWD" class="form-select" id="PWD">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <script>
                            $("#PWD").val('<?= $acc->PWD ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Address" type="text" class="form-control" id="Address" value="<?= $acc->Address ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Phone" type="text" class="form-control" id="Phone" value="<?= $acc->Phone ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Email" type="email" class="form-control" id="Email" value="<?= $acc->Email ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="UpdateProfile" />
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="CurrentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="CurrentPassword" type="password" class="form-control" id="CurrentPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="NewPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="NewPassword" type="password" class="form-control" id="NewPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="RenewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="RenewPassword" type="password" class="form-control" id="RenewPassword" required />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="ChangePassword" />
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
    <?php
      break;
    case 'Employee':
    ?>
      <section class="section profile">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="assets/img/logo.png" alt="Profile">
                <h2><?= $acc->FirstName ?> <?= $acc->LastName ?></h2>
                <h3><?= $acc->Position ?></h3>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Update</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">ID Number</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->IDNo ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->FirstName ?> <?= $acc->MiddleName ?> <?= $acc->LastName ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Position</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Position ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Division</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Division ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Client Type</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->ClientType ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->DateOfBirth ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Sex</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Sex ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">PWD</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->PWD ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Address</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Address ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Phone ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $acc->Email ?></div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="IDNo" class="col-md-4 col-lg-3 col-form-label">ID Number</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="IDNo" type="text" class="form-control" id="IDNo" value="<?= $acc->IDNo ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="FirstName" type="text" class="form-control" id="FirstName" value="<?= $acc->FirstName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="MiddleName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="MiddleName" type="text" class="form-control" id="MiddleName" value="<?= $acc->MiddleName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="LastName" type="text" class="form-control" id="LastName" value="<?= $acc->LastName ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Position" type="text" class="form-control" id="Position" value="<?= $acc->Position ?>" required / autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DivisionID" class="col-md-4 col-lg-3 col-form-label">Division</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="DivisionID" class="form-select" id="DivisionID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From divisions');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->DivisionDesc ?>"><?= $row->Division ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#DivisionID").val('<?= $acc->DivisionID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="ClientTypeID" class="col-md-4 col-lg-3 col-form-label">Client Type</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="ClientTypeID" class="form-select" id="ClientTypeID" required>
                            <option>--</option>
                            <?php
                            $query = $conn->query('Select * From clienttypes');
                            while ($row = $query->fetch_object()) {
                            ?>
                              <option value="<?= $row->id ?>" title="<?= $row->ClientTypeDesc ?>"><?= $row->ClientType ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <script>
                            $("#ClientTypeID").val('<?= $acc->ClientTypeID ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="DateOfBirth" class="col-md-4 col-lg-3 col-form-label">Date Of Birth</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="DateOfBirth" type="date" class="form-control" id="DateOfBirth" value="<?= $acc->DateOfBirth ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="Sex" class="form-select" id="Sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <script>
                            $("#Sex").val('<?= $acc->Sex ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="PWD" class="col-md-4 col-lg-3 col-form-label">PWD</label>
                        <div class="col-md-8 col-lg-9">
                          <select name="PWD" class="form-select" id="PWD">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <script>
                            $("#PWD").val('<?= $acc->PWD ?>');
                          </script>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Address" type="text" class="form-control" id="Address" value="<?= $acc->Address ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Phone" type="text" class="form-control" id="Phone" value="<?= $acc->Phone ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="Email" type="email" class="form-control" id="Email" value="<?= $acc->Email ?>" autocomplete="off" />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="UpdateProfile" />
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form class="ajax-form">

                      <div class="row mb-3">
                        <label for="CurrentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="CurrentPassword" type="password" class="form-control" id="CurrentPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="NewPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="NewPassword" type="password" class="form-control" id="NewPassword" required />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="RenewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="RenewPassword" type="password" class="form-control" id="RenewPassword" required />
                        </div>
                      </div>

                      <div class="text-center">
                        <input type="hidden" name="ChangePassword" />
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
    <?php
      break;
    default:
    ?>
      <section class="section">
        <div class="row">

          <div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Access to this page is restricted.</h5>
              </div>
            </div>
          </div>

        </div>
      </section>
  <?php
  }
  ?>

</main><!-- End #main -->

<!-- ======= Modal ======= -->
<?php require_once "assets/components/templates/modals.php" ?>

<!-- ======= Footer ======= -->
<?php require_once "assets/components/templates/footer.php" ?>