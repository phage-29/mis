<!-- helpdesk -->
<div class="modal fade" id="helpdesk-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <a href="dashboard.php" class="logo d-flex align-items-center">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block"><?= $website ?></span>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-7 border-end">
                        <h5 class="card-title">Helpdesks Details</h5>
                        <form class="enctype-form" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label for="modalDateRequested" class="col-12 col-form-label">Request Date</label>
                                <div class="col-12">
                                    <input name="DateRequested" type="date" class="form-control" id="modalDateRequested" required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="modalRequestTypeID" class="col-12 col-form-label">RequestType</label>
                                <div class="col-12">
                                    <select name="RequestTypeID" class="form-select" id="modalRequestTypeID" required>
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
                                <label for="modalCategoryID" class="col-12 col-form-label">Category</label>
                                <div class="col-12">
                                    <select name="CategoryID" class="form-select" id="modalCategoryID" required>
                                        <option value="" selected disabled>--</option>
                                        <?php
                                        $query = $conn->query("SELECT * FROM category");
                                        while ($row = $query->fetch_object()) {
                                        ?>
                                            <option data-modalreqtype="<?= $row->RequestTypeID ?>" value="<?= $row->id ?>"><?= $row->Category ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="modalSubCategoryID" class="col-12 col-form-label">Sub Category</label>
                                <div class="col-12">
                                    <select name="SubCategoryID" class="form-select" id="modalSubCategoryID" required>
                                        <option value="" selected disabled>--</option>
                                        <?php
                                        $query = $conn->query("SELECT * FROM subcategory");
                                        while ($row = $query->fetch_object()) {
                                        ?>
                                            <option data-modalcat="<?= $row->CategoryID ?>" value="<?= $row->id ?>"><?= $row->SubCategory ?></option>
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

                                    $('#modalRequestTypeID').change(function() {
                                        filterOptions('#modalCategoryID', 'modalreqtype', $(this).val());
                                        $('#modalSubCategoryID').val('');
                                    }).trigger('change');

                                    $('#modalCategoryID').change(function() {
                                        filterOptions('#modalSubCategoryID', 'modalcat', $(this).val());
                                    }).trigger('change');

                                });
                            </script>

                            <div class="row mb-3">
                                <label for="modalComplaint" class="col-12 col-form-label">Defect/Complaint</label>
                                <div class="col-12 text-end">
                                    <textarea name="Complaint" class="form-control" id="modalComplaint" maxlength="150" required></textarea>
                                    <div id="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 150</span>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            $('#modalComplaint').on('keyup', function() {
                                                var currentLength = $(this).val().length;
                                                $('#current').text(currentLength);
                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="modalDatetimePreferred" class="col-12 col-form-label">Preffered Schedule</label>
                                <div class="col-12">
                                    <input name="DatetimePreferred" type="datetime-local" class="form-control" id="modalDatetimePreferred" value="<?= date('Y-m-d H:i') ?>" required />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <h5 class="card-title">Helpdesks Status</h5>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Status</label>
                            <div class="col-12 ps-4 fw-bold" id="modalStatus"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Priority Level</label>
                            <div class="col-12 ps-4 fw-bold" id="modalPriorityLevel"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Repair Type and Classification</label>
                            <div class="col-12 ps-4 fw-bold" id="modalRepairTypeClassification"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Date & Time Started</label>
                            <div class="col-12 ps-4 fw-bold" id="modalDatetimeStarted"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Date & Time Finished</label>
                            <div class="col-12 ps-4 fw-bold" id="modalDatetimeEnded"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Remarks/Recommendation</label>
                            <div class="col-12 ps-4 fw-bold" id="modalRemarks"></div>
                        </div>
                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Diagnosis/Action Taken</label>
                            <div class="col-12 ps-4 fw-bold" id="modalDiagnosis"></div>
                        </div>
                        <hr>
                        <h5 class="card-title">Helpdesks Staff</h5>

                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Serviced By</label>
                            <div class="col-12 ps-4 fw-bold" id="modalServicedStaff"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="modalDateRequested" class="col-12 col-form-label">Approved By</label>
                            <div class="col-12 ps-4 fw-bold" id="modalApprovedStaff"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Cancel</button>
                <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.a-RequestNo', function() {
        $.ajax({
            type: "POST",
            url: "assets/components/includes/fetch.php",
            data: {
                'RequestNo': $(this).data('requestno')
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#modalDateRequested').val(response.DateRequested);
                $('#modalRequestTypeID').val(response.RequestTypeID);
                $('#modalCategoryID').val(response.CategoryID);
                $('#modalSubCategoryID').val(response.SubCategoryID);
                $('#modalComplaint').val(response.Complaint);
                $('#modalDatePreferred').val(response.DatePreferred);
                $('#modalStatus').html(response.Status);
                $('#modalPriorityLevel').html(response.PriorityLevel);
                $('#modalRepairTypeClassification').html(response.RepairType + " | " + response.RepairClass);
                $('#modalDatetimeStarted').html(response.DatetimeStarted);
                $('#modalDatetimeEnded').html(response.DatetimeEnded);
                $('#modalRemarks').html(response.Remarks);
                $('#modalDiagnosis').html(response.Diagnosis);
                $('#modalServicedStaff').html(response.ServicedStaff);
                $('#modalApprovedStaff').html(response.ApprovedStaff);
            },
            error: function(error) {
                setTimeout(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to fetch data.',
                        showConfirmButton: false,
                        timer: 750
                    }).then(function() {
                        if (response.redirect) {
                            window.location.href = response.redirect
                        }
                    })
                }, 1000)
            },
        });
    });
</script>