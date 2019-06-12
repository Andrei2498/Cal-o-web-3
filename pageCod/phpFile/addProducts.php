<?php
require 'Database.php';
$database = new database();
$conn = $database->OpenCon();
date_default_timezone_set('Europe/Bucharest');
$sql = "select timest from last_update";
$stmt = mysqli_prepare($conn, $sql);
$stmt->execute();
$stmt->bind_result($res);
$stmt->fetch();
$last_run = strtotime($res);
$stmt->close();
if (time() >= $last_run + (60 * 60 * 24)) {
    $time = date("Y-m-d H:i:s");
    $sql = "update last_update set timest = ? where id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $time);
    $stmt->execute();


    $result = file_get_contents('https://www.calories.info/food/vegetables');
    libxml_use_internal_errors(true);
    $doc = new DOMDocument();
    $doc->loadHTML($result);
    $xpath = new DOMXPath($doc);
    $indice = 0;
    $nodeList = $xpath->query('//tr[@class="kt-row"]');
    for ($i = 0; $i < $nodeList->length; $i++) {
        $linie = $nodeList->item($i)->childNodes;
        $Nume = $linie->item(0)->textContent;
        $Valoare_Calorica = (int)explode(" ", $linie->item(4)->textContent)[0];
        $sql = "insert ignore into produse set nume = ? ,valoare_calorica = ?";
        $stmt2 = $conn->prepare($sql);
        $stmt2->bind_param("si", $Nume, $Valoare_Calorica);
        $stmt2->execute();
        $stmt2->close();
    }
}
