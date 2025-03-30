<?PHP

$pdo = new PDO('mysql:host=localhost;port=10005;dbname=local', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$filename = 'planning_MDS' . date('Ymd') . '.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=' . $filename);

$output = fopen('php://output', 'w');

//Nom des colonnes des champs demandés par Doriane
fputcsv($output, array('Nom du module', 'Classe', 'Session', 'Heure de début', "Durée du cours"));

//Modifier la BDD et les données à récupérer pour que ça corresponde avec ce que Doriane veut
$stmt = $pdo->query('SELECT lesson, module_teacher, module, session, class, grade FROM disponibilites_commerciaux');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, $row);
}

fclose($output);
exit;



