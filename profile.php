<?php
    session_start();

    if (!isset($_SESSION['loggedIn'])) {
        $_SESSION['auth-error'] = '
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="bx bxs-error pe-1"></i><strong>You need to login first!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header('Location: login.php');
        exit();
    }
    
    include 'connectDB.php';
    $headTitle = 'Profile';
    include 'header.php'; 
?>

<section>
    <div class="p-5">
        <div class="container">
            <div class="text-center">
                <div class="mb-3">
                    <picture>
                        <?php $imgSource = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"?>
                        <source srcset="<?php echo $imgSource;?>" type="image/svg+xml" height="200" width="200">
                        <img src="<?php echo $imgSource;?>" class="img-fluid img-thumbnail rounded-5 object-fit-cover"
                            alt="...">
                    </picture>

                </div>
                <div class="name">
                    <h2 class="fw-bold ">Alfred Nuguit</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.nav-pills .nav-item .nav-link {
    color: var(--white);
}

.nav-pills .nav-item .active:hover {
    background: 0 !important;
    border-radius: 5px;
    color: var(--white);
}

.nav-pills .nav-item .active {
    border: 2px solid var(--blue);
    background: var(--blue) !important;
    color: var(--white);
}

.nav-pills .nav-item .nav-link {
    border: 2px solid var(--yellow);
    color: black;
}

.nav-pills .nav-item .nav-link:hover {
    transition: .3s ease;
    border: 2px solid var(--blue);
    color: var(--white);
}

#profile .container {
    background: var(--yellow) !important;
}
</style>

<section id="profile">
    <div class="container px-2 mb-5">
        <ul class="nav nav-pills fw-semibold p-3 pt-4 mb-3 mx-0 d-flex" id="pills-tab" role="tablist">
            <li class="nav-item me-1" role="presentation">
                <button class="nav-link active text-wrap" style="width: 7rem;" id="pills-profile-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                    aria-controls="pills-profile" aria-selected="false">My Profile</button>
            </li>
            <li class="nav-item me-1" role="presentation">
                <button class="nav-link text-wrap" style="width: 7rem;" id="pills-joined-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-joined" type="button" role="tab" aria-controls="pills-joined"
                    aria-selected="false">Joined Events</button>
            </li>
            <li class="nav-item me-1" role="presentation">
                <button class="nav-link text-wrap" style="width: 7rem;" id="pills-account-settings-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-account-settings" type="button" role="tab"
                    aria-controls="pills-account-settings" aria-selected="false">Account
                    Settings</button>
            </li>
        </ul>
        <hr class="mx-3">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active mb-0" id="pills-profile" role="tabpanel"
                aria-labelledby="pills-profile-tab" tabindex="0">
                <?php include 'profile/profile.php';?>
            </div>

            <div class="tab-pane fade" id="pills-joined" role="tabpanel" aria-labelledby="pills-joined-tab"
                tabindex="1">
                <div class="container p-4">
                    <h3 class="fw-bolder mb-5">Joined Events</h3>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex-inline text-center me-5">
                            <p class="fw-bolder mb-0">7</p>
                            <p class="fw-semibold">dec</p>
                        </div>
                        <div class="d-flex-inline text-center me-5">
                            <p class="fw-semibold mb-0">Title</p>
                            <p class="fw-light">Description</p>
                        </div>
                        <p class="d-flex align-items-center fw-bolder" style="font-size: 45px; color: var(--blue);">
                            <i class='bx bx-chevron-right'></i>
                        </p>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-account-settings" role="tabpanel"
                aria-labelledby="pills-account-settings-tab" tabindex="2">
                <?php include 'profile/account-settings.php';?>
            </div>

        </div>
    </div>
</section>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="js/idle.js"></script>

</html>