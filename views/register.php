<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create Account | PSP Student Portal</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body class="login-page">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card login-card p-4 p-md-5">

                <!-- Header -->

                <div class="text-center mb-4">

                    <h2>Create Your Account</h2>

                    <p class="mb-0">
                        Register as a new PSP student
                    </p>

                </div>


                <!-- Error -->

                <?php if (!empty($error)): ?>

                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error) ?>
                    </div>

                <?php endif; ?>


                <!-- Success -->

                <?php if (!empty($success)): ?>

                    <div class="alert alert-success">

                        <?= htmlspecialchars($success) ?>

                        <div class="mt-2">

                            <a href="index.php">
                                Go to Login
                            </a>

                        </div>

                    </div>

                <?php endif; ?>


                <!-- Register Form -->

                <form method="POST" action="register.php">

                    <!-- Full Name -->

                    <div class="mb-3">

                        <label
                            for="name"
                            class="form-label"
                        >
                            Full Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Enter your full name"
                            value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- NRIC -->

                    <div class="mb-3">

                        <label
                            for="ic"
                            class="form-label"
                        >
                            NRIC
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="ic"
                            name="ic"
                            placeholder="e.g. 050101-01-1234"
                            value="<?= htmlspecialchars($_POST['ic'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- Programme -->

                    <div class="mb-3">

                        <label
                            for="program"
                            class="form-label"
                        >
                            Programme
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="program"
                            name="program"
                            placeholder="e.g. Diploma in Information Technology"
                            value="<?= htmlspecialchars($_POST['program'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- Marks -->

                    <div class="mb-3">

                        <label
                            for="marks"
                            class="form-label"
                        >
                            Marks
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            id="marks"
                            name="marks"
                            min="0"
                            max="100"
                            placeholder="Enter your marks"
                            value="<?= htmlspecialchars($_POST['marks'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- Username -->

                    <div class="mb-3">

                        <label
                            for="username"
                            class="form-label"
                        >
                            Username
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            name="username"
                            placeholder="Choose a username"
                            value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                            required
                        >

                    </div>


                    <!-- Password -->

                    <div class="mb-2">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Create a strong password"
                            required
                        >

                    </div>

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
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            id="confirm_password"
                            name="confirm_password"
                            placeholder="Re-enter your password"
                            required
                        >

                    </div>


                    <!-- Register Button -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Create Account
                    </button>

                </form>


                <!-- Login -->

                <div class="text-center mt-4">

                    <span class="text-muted">
                        Already have an account?
                    </span>

                    <a
                        href="index.php"
                        class="fw-semibold"
                    >
                        Sign In
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>