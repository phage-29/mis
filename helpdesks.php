<?php
$page = "Helpdesks";
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
                        <h5 class="card-title">Request Form</h5>
                        <form class="enctype-form" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label for="DateRequested" class="col-12 col-form-label">Request Date</label>
                                <div class="col-12">
                                    <input name="DateRequested" type="date" class="form-control" id="DateRequested" value="<?= date('Y-m-d') ?>" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="RequestTypeID" class="col-12 col-form-label">RequestType</label>
                                <div class="col-12">
                                    <select name="RequestTypeID" class="form-select" id="RequestTypeID" required>
                                        <option value="" selected disabled>--</option>
                                        <?php
                                        $query = $conn->query("SELECT * FROM requesttypes");
                                        while ($row = $query->fetch_object()) {
                                        ?>
                                            <option value="<?= $row->id ?>"><?= $row->RequestType ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="CategoryID" class="col-12 col-form-label">Category</label>
                                <div class="col-12">
                                    <select name="CategoryID" class="form-select" id="CategoryID" required>
                                        <option value="" selected disabled>--</option>
                                        <?php
                                        $query = $conn->query("SELECT * FROM category");
                                        while ($row = $query->fetch_object()) {
                                        ?>
                                            <option data-reqtype="<?= $row->RequestTypeID ?>" value="<?= $row->id ?>"><?= $row->Category ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="SubCategoryID" class="col-12 col-form-label">Sub Category</label>
                                <div class="col-12">
                                    <select name="SubCategoryID" class="form-select" id="SubCategoryID" required>
                                        <option value="" selected disabled>--</option>
                                        <?php
                                        $query = $conn->query("SELECT * FROM subcategory");
                                        while ($row = $query->fetch_object()) {
                                        ?>
                                            <option data-cat="<?= $row->CategoryID ?>" value="<?= $row->id ?>"><?= $row->SubCategory ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {

                                    function filterOptions(selectElement, filterKey, filterValue) {
                                        $(selectElement + ' option').each(function() {
                                            if ($(this).data(filterKey) == filterValue || filterValue == "") {
                                                $(this).show();
                                            } else {
                                                $(this).hide();
                                            }
                                        });
                                        $(selectElement).val('');
                                    }

                                    $('#RequestTypeID').change(function() {
                                        filterOptions('#CategoryID', 'reqtype', $(this).val());
                                        $('#SubCategoryID').val('');
                                    }).trigger('change');

                                    $('#CategoryID').change(function() {
                                        filterOptions('#SubCategoryID', 'cat', $(this).val());
                                    }).trigger('change');

                                });
                            </script>

                            <div class="row mb-3">
                                <label for="Complaint" class="col-12 col-form-label">Defect/Complaint</label>
                                <div class="col-12 text-end">
                                    <textarea name="Complaint" class="form-control" id="Complaint" maxlength="150" required></textarea>
                                    <div id="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 150</span>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            $('#Complaint').on('keyup', function() {
                                                var currentLength = $(this).val().length;
                                                $('#current').text(currentLength);
                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="DatetimePreferred" class="col-12 col-form-label">Preffered Schedule</label>
                                <div class="col-12">
                                    <input name="DatetimePreferred" type="datetime-local" class="form-control" id="DatetimePreferred" value="<?= date('Y-m-d H:i') ?>" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Files" class="col-12 col-form-label">Additional Files(Optional)</label>
                                <div class="col-12">
                                    <input name="Files[]" type="file" class="form-control" id="Files" accept=".pdf,.doc,.docx,.txt,image/*" multiple />
                                </div>
                            </div>


                            <div class="text-end">
                                <input type="hidden" name="EmployeeRequest" />
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Request List</h5>
                        <table id="helpdesks-table" width="100%" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Request No</th>
                                    <th>Repair Type</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once "assets/components/templates/footer.php" ?>