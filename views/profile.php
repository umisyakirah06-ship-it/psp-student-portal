<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>My Profile | PSP Student Portal</title>

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

        <div>

            <a
                href="dashboard.php"
                class="btn btn-outline-primary btn-sm me-2"
            >
                Dashboard
            </a>

            <a
                href="logout.php"
                class="btn btn-outline-primary btn-sm"
            >
                Logout
            </a>

        </div>

    </div>

</nav>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h3 class="fw-bold mb-1">
                        My Profile
                    </h3>

                    <p class="text-muted mb-4">
                        Here’s your current student information.
                    </p>


                    <?php if (!empty($uploadMessage)): ?>

                        <div class="alert <?php echo $uploadSuccess ? 'alert-success' : 'alert-danger'; ?>">
                            <?php echo htmlspecialchars($uploadMessage); ?>
                        </div>

                    <?php endif; ?>


                    <!-- Profile Picture -->

                    <div class="text-center mb-4">

                        <?php if (!empty($student['profile_picture'])): ?>

                            <img
                                src="public/uploads/profile_pictures/<?php echo htmlspecialchars($student['profile_picture']); ?>"
                                alt="Profile Picture"
                                class="profile-picture mb-3"
                            >

                        <?php else: ?>

                            <div class="profile-placeholder mb-3">
                                No Photo
                            </div>

                        <?php endif; ?>


                        <h5 class="fw-bold mb-1">
                            Profile Picture
                        </h5>

                        <p class="text-muted small mb-3">
                            Choose a JPG, JPEG or PNG image. Maximum 2MB.
                        </p>


                        <form
                            action="profile.php"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            <input
                                type="file"
                                name="profile_picture"
                                class="form-control mb-3"
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                required
                            >


                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Upload Picture
                            </button>

                        </form>

                    </div>


                    <hr class="my-4">


                    <!-- Student Information -->

                    <div class="mb-3">

                        <label class="text-muted">
                            Name
                        </label>

                        <div class="form-control bg-light">
                            <?php echo htmlspecialchars($student['name']); ?>
                        </div>

                    </div>


                    <div class="mb-3">

                        <label class="text-muted">
                            NRIC
                        </label>

                        <div class="form-control bg-light">
                            <?php echo htmlspecialchars($student['ic']); ?>
                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="text-muted">
                            Programme
                        </label>

                        <div class="form-control bg-light">
                            <?php echo htmlspecialchars($student['program']); ?>
                        </div>

                    </div>


                    <a
                        href="change_password.php"
                        class="btn btn-primary"
                    >
                        Change Password
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>