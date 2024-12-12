<?php
include 'config.php';

$id = $_GET['id'];
execute("DELETE FROM tbl_member WHERE member_id = ?", [$id]);
header('Location: index.php');
?>
