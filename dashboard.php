<?php require_once "../auth/check_auth.php"; ?>

<?php

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$adminName = $_SESSION['admin_username'];
?>



<?php
require_once '../config/db.php';

$sql = "SELECT id, username, created_at FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- ✅ NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                Welcome, <?php echo htmlspecialchars($adminName); ?>
            </span>
            <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<!-- ✅ DASHBOARD CONTENT -->
<div class="container mt-5">
    <div class="row">
        <!-- Dashboard Card 1 -->
        <div class="col-md-4">
            <div class="card shadow p-3 mb-4">
                <h5> Admins</h5>
                
            </div>
        </div>


    <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Registered At</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No admins found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

    </div>
</div>

</body>
</html>