<?php
require_once 'db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') { 
    header("Location: login.php"); exit(); 
}

// Deposit Approval Logic
if (isset($_GET['action']) && isset($_GET['id'])) {
    $deposit_id = $_GET['id'];
    $action = $_GET['action'];

    $dep = $conn->query("SELECT * FROM deposits WHERE id=$deposit_id")->fetch_assoc();

    if ($action == 'approve' && $dep['status'] == 'pending') {
        // ইউজার ব্যালেন্স বাড়ানো
        $conn->query("UPDATE users SET balance = balance + {$dep['amount']} WHERE id={$dep['user_id']}");
        $conn->query("UPDATE deposits SET status='approved' WHERE id=$deposit_id");
    } elseif ($action == 'reject') {
        $conn->query("UPDATE deposits SET status='rejected' WHERE id=$deposit_id");
    }
    header("Location: admin.php");
}

$deposits = $conn->query("SELECT deposits.*, users.email FROM deposits JOIN users ON deposits.user_id = users.id ORDER BY deposits.id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-danger px-3">
    <span class="navbar-brand">Admin Panel</span>
    <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
</nav>

<div class="container my-4">
    <h4>Pending & Recent Deposits</h4>
    <table class="table table-bordered bg-white shadow-sm">
        <thead>
            <tr>
                <th>User Email</th>
                <th>Amount</th>
                <th>Method</th>
                <th>TrxID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $deposits->fetch_assoc()): ?>
            <tr>
                <td><?= $row['email']; ?></td>
                <td>$<?= $row['amount']; ?></td>
                <td><?= $row['method']; ?></td>
                <td><?= $row['trx_id']; ?></td>
                <td><span class="badge bg-<?= $row['status']=='approved'?'success':($row['status']=='pending'?'warning':'danger') ?>"><?= $row['status']; ?></span></td>
                <td>
                    <?php if($row['status'] == 'pending'): ?>
                        <a href="admin.php?action=approve&id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Approve</a>
                        <a href="admin.php?action=reject&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html><?php
require_once 'db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') { 
    header("Location: login.php"); exit(); 
}

// Deposit Approval Logic
if (isset($_GET['action']) && isset($_GET['id'])) {
    $deposit_id = $_GET['id'];
    $action = $_GET['action'];

    $dep = $conn->query("SELECT * FROM deposits WHERE id=$deposit_id")->fetch_assoc();

    if ($action == 'approve' && $dep['status'] == 'pending') {
        // ইউজার ব্যালেন্স বাড়ানো
        $conn->query("UPDATE users SET balance = balance + {$dep['amount']} WHERE id={$dep['user_id']}");
        $conn->query("UPDATE deposits SET status='approved' WHERE id=$deposit_id");
    } elseif ($action == 'reject') {
        $conn->query("UPDATE deposits SET status='rejected' WHERE id=$deposit_id");
    }
    header("Location: admin.php");
}

$deposits = $conn->query("SELECT deposits.*, users.email FROM deposits JOIN users ON deposits.user_id = users.id ORDER BY deposits.id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-danger px-3">
    <span class="navbar-brand">Admin Panel</span>
    <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
</nav>

<div class="container my-4">
    <h4>Pending & Recent Deposits</h4>
    <table class="table table-bordered bg-white shadow-sm">
        <thead>
            <tr>
                <th>User Email</th>
                <th>Amount</th>
                <th>Method</th>
                <th>TrxID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $deposits->fetch_assoc()): ?>
            <tr>
                <td><?= $row['email']; ?></td>
                <td>$<?= $row['amount']; ?></td>
                <td><?= $row['method']; ?></td>
                <td><?= $row['trx_id']; ?></td>
                <td><span class="badge bg-<?= $row['status']=='approved'?'success':($row['status']=='pending'?'warning':'danger') ?>"><?= $row['status']; ?></span></td>
                <td>
                    <?php if($row['status'] == 'pending'): ?>
                        <a href="admin.php?action=approve&id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Approve</a>
                        <a href="admin.php?action=reject&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Reject</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
