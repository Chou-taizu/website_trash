<?php
require_once 'function.php'; // fichier qui récupère les données
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Capteurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>

    <main class="container">
        <h1>Liste des Capteurs</h1>

        <?php if (!empty($capteurs)): ?>
            <table class="table striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Adresse</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($capteurs as $capteur): ?>
                        <tr>
                            <td><?= htmlspecialchars($capteur['Id_capteur'] ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($capteur['Type'] ?? 'Inconnu') ?></td>
                            <td><?= htmlspecialchars($capteur['Adresse'] ?? 'Inconnu') ?></td>
                            <td><?= htmlspecialchars($capteur['Latitude'] ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($capteur['Longitude'] ?? 'N/A') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune donnée trouvée.</p>
        <?php endif; ?>
    </main>

</body>
</html>
