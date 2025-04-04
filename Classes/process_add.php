<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_school_year'])) {
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];

        $stmt = $pdo->prepare("INSERT INTO school_years (start_date, end_date) VALUES (?, ?)");
        $stmt->execute([$startDate, $endDate]);
    }

    if (isset($_POST['add_class'])) {
        $name = $_POST['class_name'];
        $schoolYearId = $_POST['school_year_id'];

        $stmt = $pdo->prepare("INSERT INTO classes (name, school_year_id) VALUES (?, ?)");
        $stmt->execute([$name, $schoolYearId]);
    }

    if (isset($_POST['add_module'])) {
        $name = $_POST['module_name'];
        $classId = $_POST['class_id'];

        $stmt = $pdo->prepare("INSERT INTO modules (name, class_id) VALUES (?, ?)");
        $stmt->execute([$name, $classId]);
    }

    if (isset($_POST['add_trainer'])) {
        $name = $_POST['trainer_name'];
        $email = $_POST['trainer_email'];
        $phone = $_POST['trainer_phone'];

        $stmt = $pdo->prepare("INSERT INTO trainers (name, email, phone) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $phone]);
    }

    header("Location: index.php");
    exit();
}
?>
