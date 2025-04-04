<?php
require_once '.\BDD\db.php';


function getEvents($year, $month, $classId = null, $moduleId = null, $trainerId = null) {
    global $pdo;
    $startDate = "$year-$month-01";
    $endDate = date('Y-m-t', strtotime($startDate));

    $sql = "SELECT * FROM events WHERE start_date BETWEEN ? AND ?";
    $params = [$startDate, $endDate];

    if ($classId !== null) {
        $sql .= " AND class_id = ?";
        $params[] = $classId;
    }

    if ($moduleId !== null) {
        $sql .= " AND module_id = ?";
        $params[] = $moduleId;
    }

    if ($trainerId !== null) {
        $sql .= " AND trainer_id = ?";
        $params[] = $trainerId;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSchoolYears() {
    global $pdo;
    $stmt = $pdo->query("SELECT id, name, start_date, end_date FROM school_years");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function getClasses($schoolYearId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id, name FROM classes WHERE school_year_id = ?");
    $stmt->execute([$schoolYearId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getModules($classId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT id, name FROM modules WHERE class_id = ?");
    $stmt->execute([$classId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTrainers() {
    global $pdo;
    $stmt = $pdo->query("SELECT id, name FROM trainers");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
