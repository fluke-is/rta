<?php
include 'config.php';

// Fetch dropdown options from database
$trainings = query("SELECT * FROM tbl_Training");
$companies = query("SELECT * FROM tbl_Company");
$bloods = query("SELECT * FROM tbl_Blood");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $national_id = $_POST['national_id'];
    $training_id = $_POST['training_id'];
    $company_id = $_POST['company_id'];
    $blood_id = $_POST['blood_id'];

    if ($first_name && $last_name && $national_id && $training_id && $company_id && $blood_id) {
        execute(
            "INSERT INTO tbl_member (first_name, last_name, national_id, training_id, company_id, blood_id) VALUES (?, ?, ?, ?, ?, ?)",
            [$first_name, $last_name, $national_id, $training_id, $company_id, $blood_id]
        );
        header('Location: index.php');
    } else {
        echo "Please fill all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
</head>
<body>
    <h1>Add Member</h1>
    <form method="POST">
        <label>First Name:</label>
        <input type="text" name="first_name"><br>
        
        <label>Last Name:</label>
        <input type="text" name="last_name"><br>

        <label>National ID:</label>
        <input type="text" name="national_id"><br>

        <label>Training Unit:</label>
        <select name="training_id">
            <option value="">Select</option>
            <?php foreach ($trainings as $training): ?>
                <option value="<?= $training['training_id'] ?>"><?= htmlspecialchars($training['training_unit']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Company:</label>
        <select name="company_id">
            <option value="">Select</option>
            <?php foreach ($companies as $company): ?>
                <option value="<?= $company['company_id'] ?>"><?= htmlspecialchars($company['company_name']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Blood Type:</label>
        <select name="blood_id">
            <option value="">Select</option>
            <?php foreach ($bloods as $blood): ?>
                <option value="<?= $blood['blood_id'] ?>"><?= htmlspecialchars($blood['blood_type']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
