<?php
session_start();
header('Content-Type: application/json');

// Vérifie si un message est stocké en session
if (!empty($_SESSION['newsletter_message'])) {
    $message = $_SESSION['newsletter_message'];
    unset($_SESSION['newsletter_message']); // Suppression immédiate après lecture

    // Si c’est déjà un tableau JSON structuré
    if (is_array($message)) {
        echo json_encode($message);
    } else {
        // Par défaut, on considère que c’est un message de succès simple
        echo json_encode([
            'success' => true,
            'message' => $message
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => '']);
}
