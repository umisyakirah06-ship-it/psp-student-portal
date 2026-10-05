<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student - PSP Student Portal</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <h2 class="mb-4">Add Student</h2>

                    <?php if (!empty($error)): ?>

                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>

                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                IC
                            </label>

                            <input
                                type="text"
                                name="ic"
                                class="form-control"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Program
                            </label>

                            <input
                                type="text"
                                name="program"
                                class="form-control"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Marks
                            </label>

                            <input
                                type="number"
                                name="marks"
                                class="form-control"
                                min="0"
                                max="100"
                                required
                            >

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Add Student
                        </button>

                        <a
                            href="students.php"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>