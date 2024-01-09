<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="helpdesks.php">
                <i class="bi bi-grid"></i>
                <span>Helpdesks</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="meetings.php">
                <i class="bi bi-grid"></i>
                <span>Meetings</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->
<script>
    $(document).ready(function() {
        var currentLocation = window.location.pathname.split('/').pop(); // gets the current path

        // Loop through each anchor tag inside #sidebar-nav
        $('#sidebar-nav a').each(function() {
            var href = $(this).attr('href');

            // Check if href matches the current location
            if (href === currentLocation) {
                $(this).removeClass('collapsed'); // Remove the 'collapsed' class
            }
        });
    });
</script>