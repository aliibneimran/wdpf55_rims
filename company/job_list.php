<?php include_once("header.php"); ?>
<link rel="stylesheet" href="sidebar.css">
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="../img/com-logo-1.jpg" alt="avatar" class="rounded-circle img-fluid" style="width: 100px;">
                        <h5 class="my-3">John Smith</h5>
                        <aside id="sidebar" class="sidebar">
                            <ul class="sidebar-nav" id="sidebar-nav">
                                <li class="nav-item">
                                    <a class="nav-link " href="home.php">
                                        <i class="fas fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="profile.php">
                                        <i class="fas fa-user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="job_list.php">
                                        <i class="fas fa-folder-open"></i>
                                        <span>Jobs</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="applicants.php">
                                        <i class="fas fa-user-graduate"></i>
                                        <span>Applicants</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="messages.php">
                                        <i class="fas fa-comment-alt"></i>
                                        <span>Messages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="logout.php">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="">
                            jobs list
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once("footer.php"); ?>