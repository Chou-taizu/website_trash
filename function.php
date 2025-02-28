<?php
// Vérifie si une session PHP est déjà active
if (session_status() == PHP_SESSION_NONE) {
    // Si aucune session n'est active, en démarrer une nouvelle
    session_start();
}

// Définition de l'URL de l'API REST qui fournit les données des capteurs
$api_url = "http://51.44.23.21:3000/capteurs";

try {
    // Initialisation de cURL pour effectuer une requête HTTP
    $ch = curl_init();

    // Spécifie l'URL de l'API à interroger
    curl_setopt($ch, CURLOPT_URL, $api_url);

    // Indique que la réponse de l'API doit être retournée sous forme de chaîne au lieu d'être affichée directement
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Définit l'en-tête HTTP de la requête pour indiquer que les données échangées sont au format JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    // Exécute la requête cURL et stocke la réponse dans une variable
    $response = curl_exec($ch);

    // Récupère le code HTTP de la réponse pour vérifier si la requête a réussi
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Ferme la session cURL et libère les ressources associées
    curl_close($ch);

    // Vérifie si le code HTTP indique une erreur ou si la réponse est vide
    if ($http_code !== 200 || !$response) {
        // Lève une exception avec un message d'erreur si la requête a échoué
        throw new Exception("Erreur de récupération des données. Code HTTP: $http_code");
    }

    // Décode la réponse JSON de l'API en un tableau associatif PHP
    $capteurs = json_decode($response, true);

    // Vérifie que les données retournées sont bien sous forme de tableau
    if (!is_array($capteurs)) {
        // Si ce n'est pas un tableau valide, déclenche une exception
        throw new Exception("Données invalides de l'API.");
    }

} catch (Exception $e) {
    // En cas d'erreur, affiche le message d'erreur et arrête l'exécution du script
    die("Erreur : " . $e->getMessage());
}
?>
