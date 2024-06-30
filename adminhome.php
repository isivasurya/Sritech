

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">SRI TECHNOLOGIES</a>
        <div class="ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                <?php
                        session_start();
                    if (isset($_SESSION['email'])) {
                        echo '<span class="nav-link text-white">' . $_SESSION['email'] . '</span>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <form method="POST" action="logout.php">
                        <button type="submit" class="btn btn-outline-light" name="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
    <?php
        if (isset($_SESSION['status'])) {
            echo '<div class="alert alert-info" role="alert">' . $_SESSION['status'] . '</div>';
            unset($_SESSION['status']); 
        }
        ?>
        <div class="card">
            <h5 class="card-header">Add Project</h5>
            <div class="card-body">
                <form action="addprojects.php" method="POST">
                    <div class="form-group">
                        <label for="project_id">Project ID</label>
                        <input type="text" class="form-control" id="project_id" name="project_id" required>
                    </div>
                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" required>
                    </div>
                    <div class="form-group">
                        <label for="project_status">Project Status</label>
                        <input type="text" class="form-control" id="project_status" name="project_status" required>
                        just write yet to start for a new project 
                    </div>
                    <div class="form-group">
                        <label for="project_description">Project Description</label>
                        <textarea class="form-control" id="project_description" name="project_description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addprojects">Add Project</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
