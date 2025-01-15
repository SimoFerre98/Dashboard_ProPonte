<?php

$webhookUrl = "https://discord.com/api/webhooks/1329027270429376584/3OLnqBdFFktKw9EtepfVw9m1LjRZ9p2W-I-YUt0xBofPc9tGDCDN4qKhcoD6086R8hJN";
$buch = "SELECT b.titel, l.name AS ausleiher, u.name AS bearbeiter, l.start FROM buecher b INNER JOIN lendings l ON b.id = l.buch_id INNER JOIN users u ON u.id = l.user_id WHERE b.id = $id";
$result = $conn->query($buch);
$row = $result->fetch_assoc();
$title = $row['titel'];
$name = $row['ausleiher'];
$lent_date = $row['start'];
$bearbeiter = $row['bearbeiter'];

$data = [
    "content" => "",
    "embeds" => [
        [
            "title" => "Neue Ausleihe",
            "description" => "**Titel des Buches:** $title \n **Ausgeliehen von:** $name \n **Bearbeiter:** $bearbeiter \n 
            Ausleih datum: $lent_date \n **Rückgabe datum:** $end_time \n **Buch ansehen:** [Hier klicken](http://localhost/mtsp4it-bibliothek/build/pages/book_details.php?book_id=$id)", 
            "color" => hexdec("3498db"),
            ],
        ]
        ];
$jsonData = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Anfrage ausführen
$response = curl_exec($ch);

// Fehler prüfen
if (curl_errno($ch)) {
    echo 'cURL-Fehler: ' . curl_error($ch);
} else {
    echo 'Erfolg: ' . $response;
}

// cURL schließen
curl_close($ch);

?>