
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php" style="height: 100px;">
<!--        <div class="sidebar-brand-icon">-->
<!--            <i class="fas fa-school"></i>-->
<!--        </div>-->
<!--        <div class="sidebar-brand-text mx-3">ABC International</div>-->
        <img src="img/logo.png" alt="" style="width: 100%">
    </a>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="admin_dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Rooms -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
           aria-controls="collapse1">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Room Type</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-gradient-light py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_rooms_single_bed.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Single Bed</span>
                </a>
                <a class="collapse-item" href="admin_rooms_double_bed.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Double Bed</span>
                </a>
                <a class="collapse-item" href="admin_rooms_tripe_bed.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Triple Bed</span>
                </a>
                <a class="collapse-item" href="admin_rooms_quadruple_bed.php">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Quadruple Bed</span>
                </a>
            </div>
        </div>
    </li>


    <!-- Availability -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true"
           aria-controls="collapse2">
            <i class="fas fa-fw fa-check-square"></i>
            <span>Availability</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-gradient-light py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_rooms_occupied.php">
                    <i class="fas fa-fw fa-times-circle"></i>
                    <span>Occupied</span>
                </a>
                <a class="collapse-item" href="admin_rooms_available.php">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Available</span>
                </a>
            </div>
        </div>
    </li>


    <!-- Availability -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
           aria-controls="collapse3">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Students Management</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-gradient-light py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_enroll_student.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Enroll a student</span>
                </a>
                <a class="collapse-item" href="admin_registered_students.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Registered student</span>
                </a>
                <a class="collapse-item" href="admin_shift_room.php">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Shift Room</span>
                </a>
            </div>
        </div>
    </li>




    <!-- backup -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true"
           aria-controls="collapse5">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Payments</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="heading4"
             data-parent="#accordionSidebar">
            <div class="bg-gradient-light py-2 collapse-inner rounded">
                <a class="collapse-item" href="admin_enter_payment.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Payment Entry</span>
                </a>
                <a class="collapse-item" href="admin_all_invoices.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>All Invoices</span>
                </a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->