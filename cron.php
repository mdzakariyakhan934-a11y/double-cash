<?php
require_once 'db.php';

// সকল অ্যাক্টিভ ইনভেস্টমেন্টের জন্য ইউজার ব্যালেন্সে লাভ যোগ
$sql = "SELECT * FROM investments WHERE status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['user_id'];
        $profit = $row['daily_profit'];

        // ইউজারের প্রফিট যোগ
        $conn->query("UPDATE users SET balance = balance + $profit WHERE id = $user_id");
    }
    echo "Daily ROI added successfully!";
} else {
    echo "No active investments.";
}
?>
