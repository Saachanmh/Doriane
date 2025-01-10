<?PHP

$pdo = new PDO('mysql:host=localhost;port=10005;dbname=local', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$filename = 'planning_MDS' . date('Ymd') . '.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=' . $filename);

$output = fopen('php://output', 'w');

fputcsv($output, array('Leçon', 'Intervenant', 'Module', 'Session', 'Classe', 'Année'));

$stmt = $pdo->query('SELECT lesson, module_teacher, module, session, class, grade FROM disponibilites_commerciaux');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit;



