<?php
include 'config.php';

// Query with JOIN to get related data
$query = "
    SELECT 
        m.member_id, 
        m.first_name, 
        m.last_name, 
        t.training_unit, 
        c.company_name, 
        b.blood_type 
    FROM tbl_member m
    JOIN tbl_Training t ON m.training_id = t.training_id
    JOIN tbl_Company c ON m.company_id = c.company_id
    JOIN tbl_Blood b ON m.blood_id = b.blood_id
";

$members = query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
</head>
<body>
    <h1>Member List</h1>
    <a href="create.php">เพิ่มสมาชิก</a>
    <table border="1">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อจริง</th>
            <th>นามสกุล</th>
            <th>หน่วยฝึก</th>
            <th>กองร้อย</th>
            <th>กรุ๊ปเลือด</th>
            <th>-</th>
        </tr>
        <?php foreach ($members as $member): ?>
        <tr>
            <td><?= $member['member_id'] ?></td>
            <td><?= htmlspecialchars($member['first_name']) ?></td>
            <td><?= htmlspecialchars($member['last_name']) ?></td>
            <td><?= htmlspecialchars($member['training_unit']) ?></td>
            <td><?= htmlspecialchars($member['company_name']) ?></td>
            <td><?= htmlspecialchars($member['blood_type']) ?></td>
            <td>
                <a href="update.php?id=<?= $member['member_id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $member['member_id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
