<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Change Password | PSP Student Portal</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="dashboard.php"
        >
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


<!-- Main Content -->

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card">

                <div class="card-body p-4 p-md-5">

                    <!-- Heading -->

                    <div class="text-center mb-4">

                        <h3 class="fw-bold">
                            Change Password
                        </h3>

                        <p class="text-muted mb-0">
                            Keep your account secure with a new password.
                        </p>

                    </div>


                    <!-- Form -->

                    <form method="POST">

                        <!-- Current Password -->

                        <div class="mb-3">

                            <label
                                for="old_password"
                                class="form-label"
                            >
                                Current Password
                            </label>

                            <input
                                type="password"
                                name="old_password"
                                id="old_password"
                                class="form-control"
                                placeholder="Enter your current password"
                                required
                            >

                        </div>


                        <!-- New Password -->

                        <div class="mb-2">

                            <label
                                for="new_password"
                                class="form-label"
                            >
                                New Password
                            </label>

                            <input
                                type="password"
                                name="new_password"
                                id="new_password"
                                class="form-control"
                                placeholder="Create a strong password"
                                required
                            >

                        </div>


                        <!-- Password Requirement -->

                        <div class="password-requirement mb-3">

                            <small>
                                Password must contain:
                            </small>

                            <ul>
                                <li>At least 8 characters</li>
                                <li>One uppercase letter (A-Z)</li>
                                <li>One lowercase letter (a-z)</li>
                                <li>One number (0-9)</li>
                            </ul>

                        </div>


                        <!-- Confirm Password -->

                        <div class="mb-4">

                            <label
                                for="confirm_password"
                                class="form-label"
                            >
                                Confirm New Password
                            </label>

                            <input
                                type="password"
                                name="confirm_password"
                                id="confirm_password"
                                class="form-control"
                                placeholder="Re-enter your new password"
                                required
                            >

                        </div>


                        <!-- Update Button -->

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Update Password
                        </button>

                    </form>


                    <!-- Back -->

                    <div class="text-center mt-4">

                        <a href="dashboard.php">
                            ← Back to Dashboard
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Message Popup -->

<?php require_once "views/message.php"; ?>


<!-- Bootstrap JavaScript -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- Success Popup -->

<?php if (!empty($message)): ?>

<script>

document.addEventListener("DOMContentLoaded", function () {

    showMessage(
        "success",
        "Password Updated!",
        <?= json_encode($message) ?>
    );

});

</script>

<?php endif; ?>


<!-- Error Popup -->

<?php if (!empty($error)): ?>

<script>

document.addEventListener("DOMContentLoaded", function () {

    showMessage(
        "error",
        "Unable to Update",
        <?= json_encode($error) ?>
    );

});

</script>

<?php endif; ?>


</body>
</html>