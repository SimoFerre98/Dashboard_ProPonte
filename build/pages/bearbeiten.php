<?php
// Verbindung zur Datenbank herstellen
include "../../db.php";

$isbn = $_GET['isbn'];
$query = "SELECT * FROM buch WHERE isbn = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $isbn);
$stmt->execute();
$result = $stmt->get_result();
$buch = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titel = $_POST['titel'];
    $beschreibung = $_POST['beschreibung'];
    $verlag = $_POST['verlag'];
    $anschaffungspreis = $_POST['anschaffungspreis'];
    $kategorie = $_POST['kategorie'];

    $updateQuery = "UPDATE buch SET titel = ?, beschreibung = ?, verlag = ?, anschaffungspreis = ?, kategorie = ? WHERE isbn = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ssssss", $titel, $beschreibung, $verlag, $anschaffungspreis, $kategorie, $isbn);
    
    if ($updateStmt->execute()) {
        header("Location: bibliothekar.php?message=success");
        exit();
    } else {
        $error = "Fehler beim Aktualisieren des Datensatzes.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buch bearbeiten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6">Buch bearbeiten</h1>

        <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-600 p-4 mb-4 rounded-lg">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <form action="bearbeiten.php?isbn=<?= $isbn ?>" method="POST">
            <!-- Titel -->
            <div class="mb-4">
                <label for="titel" class="block text-sm font-medium text-gray-700">Titel</label>
                <input type="text" name="titel" id="titel" value="<?= htmlspecialchars($buch['titel']) ?>" required
                    class="mt-1 p-2 block w-full border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Beschreibung -->
            <div class="mb-4">
                <label for="beschreibung" class="block text-sm font-medium text-gray-700">Beschreibung</label>
                <textarea name="beschreibung" id="beschreibung" rows="4" required
                    class="mt-1 p-2 block w-full border rounded-md focus:ring-blue-500 focus:border-blue-500"><?= htmlspecialchars($buch['beschreibung']) ?></textarea>
            </div>

            <!-- Verlag -->
            <div class="mb-4">
                <label for="verlag" class="block text-sm font-medium text-gray-700">Verlag</label>
                <input type="text" name="verlag" id="verlag" value="<?= htmlspecialchars($buch['verlag']) ?>" required
                    class="mt-1 p-2 block w-full border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Anschaffungspreis -->
            <div class="mb-4">
                <label for="anschaffungspreis" class="block text-sm font-medium text-gray-700">Anschaffungspreis in €</label>
                <input type="number" name="anschaffungspreis" id="anschaffungspreis" step="0.01"
                    value="<?= htmlspecialchars($buch['anschaffungspreis']) ?>" required
                    class="mt-1 p-2 block w-full border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Kategorie -->
            <div class="mb-4">
                <label for="kategorie" class="block text-sm font-medium text-gray-700">Kategorie</label>
                <input type="text" name="kategorie" id="kategorie" value="<?= htmlspecialchars($buch['kategorie']) ?>" required
                    class="mt-1 p-2 block w-full border rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-4">
                <a href="bibliothekar.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Abbrechen</a>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Speichern</button>
            </div>
        </form>
    </div>
</body>

</html>
