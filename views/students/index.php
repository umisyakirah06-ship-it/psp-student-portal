<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Student Records | PSP Student Portal</title>

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

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Student Records
            </h2>

            <p class="text-muted mb-0">
                View and manage student information here.
            </p>

        </div>

        <a
            href="student_create.php"
            class="btn btn-primary"
        >
            + Add Student
        </a>

    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>NRIC</th>
                            <th>Programme</th>
                            <th>Marks</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($students)): ?>

                        <?php foreach ($students as $student): ?>

                            <tr>

                                <td>
                                    <?php echo $student['id']; ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($student['name']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($student['ic']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($student['program']); ?>
                                </td>

                                <td>
                                    <?php echo $student['marks']; ?>
                                </td>

                                <td>

                                    <a
                                        href="student_edit.php?id=<?php echo $student['id']; ?>"
                                        class="btn btn-sm btn-outline-primary"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="student_delete.php?id=<?php echo $student['id']; ?>"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this student?');"
                                    >
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="6"
                                class="text-center text-muted"
                            >
                                No student records found.
                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>