<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login | PSP Student Portal</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body class="login-page">

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card login-card">

                <div class="card-body p-4 p-md-5">

                    <!-- Header -->
                    <div class="text-center mb-4">

                        <h2 class="fw-bold">
                            PSP Student Portal
                        </h2>

                        <p class="text-muted mb-1">
                            Welcome back! 👋
                        </p>

                        <small class="text-muted">
                            Sign in to continue
                        </small>

                    </div>


                    <!-- Error Message -->
                    <?php if (!empty($error)): ?>

                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>

                    <?php endif; ?>


                    <!-- Login Form -->
                    <form method="POST" action="index.php">

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
                                placeholder="Enter your username"
                                required
                            >

                        </div>


                        <!-- Password -->
                        <div class="mb-4">

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
                                placeholder="Enter your password"
                                required
                            >

                        </div>


                        <!-- Sign In -->
                        <button
                            type="submit"
                            name="login"
                            class="btn btn-primary w-100"
                        >
                            Sign In
                        </button>

                    </form>


                    <!-- Register -->
                    <div class="text-center mt-4">

                        <span class="text-muted">
                            Don't have an account?
                        </span>

                        <a
                            href="register.php"
                            class="fw-semibold"
                        >
                            Create an account
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>