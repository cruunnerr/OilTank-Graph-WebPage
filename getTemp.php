<?php
    
    $dbname = 'Tank';
    $table = 'Volumen';
    $username = 'root'; // Enter Username Here
    $password = ''; // Enter Password Here
    $port = '3307';
    $host = '127.0.0.1';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", "$username", "$password");
    
    
    try {
        $result = $conn->query('SELECT * FROM Tank.Volumen');
                               
$rows = array();
$table = array();
$table['cols'] = array(array('label' => 'Datum', 'type' => 'string'),array('label' => 'Volumen', 'type' => 'number'));
                               
foreach($result as $r) {
                               
$data = array();
$data[] = array('v' => (string) $r['Datum']);
$data[] = array('v' => (int) $r['Volumen']);
                               
$rows[] = array('c' => $data);
                               
}
                               
                               $table['rows'] = $rows;
                               
                               } catch(PDOException $e) {
                               echo 'ERROR: ' . $e->getMessage();
                               }
                               
                               try {
                               $result2 = $conn->prepare('SELECT * FROM Volumen ORDER BY Datum DESC LIMIT 1');
                               
                               $result2->execute();
                               
                               } catch(PDOException $e) {
                               echo 'ERROR: ' . $e->getMessage();
                               }
                               
?>

