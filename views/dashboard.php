<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard | PSP Student Portal</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="dashboard.php">
            PSP Student Portal
        </a>

        <div class="d-flex align-items-center">

            <span class="me-3">
                Hi, <?php echo htmlspecialchars($username); ?> 👋
            </span>

            <a href="logout.php" class="btn btn-outline-danger btn-sm">
                Logout
            </a>

        </div>

    </div>

</nav>


<div class="container py-5">

    <div class="mb-4">

        <h2 class="fw-bold">
            Hi, <?php echo htmlspecialchars($username); ?>! 👋
        </h2>

        <p class="text-muted">
            Here’s what you need for your student account.
        </p>

    </div>


    <div class="row g-4">

        <!-- Profile -->

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold">
                        My Profile
                    </h5>

                    <p class="text-muted">
                        Keep your personal information up to date.
                    </p>

                    <a href="profile.php" class="btn btn-primary">
                        View Profile
                    </a>

                </div>

            </div>

        </div>


        <!-- Student Records -->

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold">
                        Student Records
                    </h5>

                    <p class="text-muted">
                        View student information and marks.
                    </p>

                    <a href="students.php" class="btn btn-primary">
                        View Records
                    </a>

                </div>

            </div>

        </div>


        <!-- Account Settings -->

        <div class="col-md-4">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <h5 class="fw-bold">
                        Account Settings
                    </h5>

                    <p class="text-muted">
                        Update your password and account details.
                    </p>

                    <a href="change_password.php" class="btn btn-primary">
                        Manage Account
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>