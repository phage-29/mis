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
    <?php
    switch ($acc->Role) {
        case 'Admin':
    ?>
            <section class="section">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Request Form</h5>
                                <form class="enctype-form" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="DateRequested" class="col-12 col-form-label">Date</label>
                                        <div class="col-12">
                                            <input name="DateRequested" type="date" class="form-control" id="DateRequested" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Topic" class="col-12 col-form-label">Topic/Title</label>
                                        <div class="col-12 text-end">
                                            <textarea name="Topic" class="form-control" id="Topic" maxlength="150" required></textarea>
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
                                        <label for="DateScheduled" class="col-12 col-form-label">Schedule</label>
                                        <div class="col-12">
                                            <input name="DateScheduled" type="date" class="form-control" id="DateScheduled" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeStart" class="col-12 col-form-label">Time Start At</label>
                                        <div class="col-12">
                                            <input name="TimeStart" type="time" class="form-control" id="TimeStart" value="<?= date('H:00', strtotime(date('H:00') . ' +1 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeEnd" class="col-12 col-form-label">Time End At</label>
                                        <div class="col-12">
                                            <input name="TimeEnd" type="time" class="form-control" id="TimeEnd" value="<?= date('H:00', strtotime(date('H:00') . ' +2 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <input type="hidden" name="EmployeeZoomRequest" />
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Schedule Calendar</h5>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var calendarEl = document.getElementById('calendar');

                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialDate: new Date(),
                                            initialView: 'dayGridMonth',
                                            headerToolbar: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'dayGridMonth,dayGridWeek'
                                            },
                                            height: 'auto',
                                            navLinks: true, // can click day/week names to navigate views
                                            selectable: true,
                                            nowIndicator: true,
                                            dayMaxEventRows: 2,
                                            events: [{
                                                title: 'Sample Meeting',
                                                start: '2024-01-11 08:00:00',
                                                end: '2024-01-11 12:00:00'
                                            }, ]
                                        });

                                        calendar.render();
                                    });
                                </script>
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <?php
            break;
        case 'Officer':
        ?>
            <section class="section">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Request Form</h5>
                                <form class="enctype-form" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="DateRequested" class="col-12 col-form-label">Date</label>
                                        <div class="col-12">
                                            <input name="DateRequested" type="date" class="form-control" id="DateRequested" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Topic" class="col-12 col-form-label">Topic/Title</label>
                                        <div class="col-12 text-end">
                                            <textarea name="Topic" class="form-control" id="Topic" maxlength="150" required></textarea>
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
                                        <label for="DateScheduled" class="col-12 col-form-label">Schedule</label>
                                        <div class="col-12">
                                            <input name="DateScheduled" type="date" class="form-control" id="DateScheduled" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeStart" class="col-12 col-form-label">Time Start At</label>
                                        <div class="col-12">
                                            <input name="TimeStart" type="time" class="form-control" id="TimeStart" value="<?= date('H:00', strtotime(date('H:00') . ' +1 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeEnd" class="col-12 col-form-label">Time End At</label>
                                        <div class="col-12">
                                            <input name="TimeEnd" type="time" class="form-control" id="TimeEnd" value="<?= date('H:00', strtotime(date('H:00') . ' +2 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <input type="hidden" name="EmployeeZoomRequest" />
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Schedule Calendar</h5>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var calendarEl = document.getElementById('calendar');

                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialDate: new Date(),
                                            initialView: 'dayGridMonth',
                                            headerToolbar: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'dayGridMonth,dayGridWeek'
                                            },
                                            height: 'auto',
                                            navLinks: true, // can click day/week names to navigate views
                                            selectable: true,
                                            nowIndicator: true,
                                            dayMaxEventRows: 2,
                                            events: [{
                                                title: 'Sample Meeting',
                                                start: '2024-01-11 08:00:00',
                                                end: '2024-01-11 12:00:00'
                                            }, ]
                                        });

                                        calendar.render();
                                    });
                                </script>
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <?php
            break;
        case 'Staff':
        ?>
            <section class="section">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Request Form</h5>
                                <form class="enctype-form" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="DateRequested" class="col-12 col-form-label">Date</label>
                                        <div class="col-12">
                                            <input name="DateRequested" type="date" class="form-control" id="DateRequested" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Topic" class="col-12 col-form-label">Topic/Title</label>
                                        <div class="col-12 text-end">
                                            <textarea name="Topic" class="form-control" id="Topic" maxlength="150" required></textarea>
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
                                        <label for="DateScheduled" class="col-12 col-form-label">Schedule</label>
                                        <div class="col-12">
                                            <input name="DateScheduled" type="date" class="form-control" id="DateScheduled" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeStart" class="col-12 col-form-label">Time Start At</label>
                                        <div class="col-12">
                                            <input name="TimeStart" type="time" class="form-control" id="TimeStart" value="<?= date('H:00', strtotime(date('H:00') . ' +1 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeEnd" class="col-12 col-form-label">Time End At</label>
                                        <div class="col-12">
                                            <input name="TimeEnd" type="time" class="form-control" id="TimeEnd" value="<?= date('H:00', strtotime(date('H:00') . ' +2 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <input type="hidden" name="EmployeeZoomRequest" />
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Schedule Calendar</h5>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var calendarEl = document.getElementById('calendar');

                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialDate: new Date(),
                                            initialView: 'dayGridMonth',
                                            headerToolbar: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'dayGridMonth,dayGridWeek'
                                            },
                                            height: 'auto',
                                            navLinks: true, // can click day/week names to navigate views
                                            selectable: true,
                                            nowIndicator: true,
                                            dayMaxEventRows: 2,
                                            events: [{
                                                title: 'Sample Meeting',
                                                start: '2024-01-11 08:00:00',
                                                end: '2024-01-11 12:00:00'
                                            }, ]
                                        });

                                        calendar.render();
                                    });
                                </script>
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <?php
            break;
        case 'Employee':
        ?>
            <section class="section">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Request Form</h5>
                                <form class="enctype-form" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="DateRequested" class="col-12 col-form-label">Date</label>
                                        <div class="col-12">
                                            <input name="DateRequested" type="date" class="form-control" id="DateRequested" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Topic" class="col-12 col-form-label">Topic/Title</label>
                                        <div class="col-12 text-end">
                                            <textarea name="Topic" class="form-control" id="Topic" maxlength="150" required></textarea>
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
                                        <label for="DateScheduled" class="col-12 col-form-label">Schedule</label>
                                        <div class="col-12">
                                            <input name="DateScheduled" type="date" class="form-control" id="DateScheduled" value="<?= date('Y-m-d') ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeStart" class="col-12 col-form-label">Time Start At</label>
                                        <div class="col-12">
                                            <input name="TimeStart" type="time" class="form-control" id="TimeStart" value="<?= date('H:00', strtotime(date('H:00') . ' +1 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="TimeEnd" class="col-12 col-form-label">Time End At</label>
                                        <div class="col-12">
                                            <input name="TimeEnd" type="time" class="form-control" id="TimeEnd" value="<?= date('H:00', strtotime(date('H:00') . ' +2 hour')) ?>" required />
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <input type="hidden" name="EmployeeZoomRequest" />
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Zoom Schedule Calendar</h5>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var calendarEl = document.getElementById('calendar');

                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialDate: new Date(),
                                            initialView: 'dayGridMonth',
                                            headerToolbar: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'dayGridMonth,dayGridWeek'
                                            },
                                            height: 'auto',
                                            navLinks: true, // can click day/week names to navigate views
                                            selectable: true,
                                            nowIndicator: true,
                                            dayMaxEventRows: 2,
                                            events: [{
                                                title: 'Sample Meeting',
                                                start: '2024-01-11 08:00:00',
                                                end: '2024-01-11 12:00:00'
                                            }, ]
                                        });

                                        calendar.render();
                                    });
                                </script>
                                <div id='calendar'></div>
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