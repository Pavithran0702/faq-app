<?php
require 'config.php';

header('Content-Type: application/json');

if (!isset($_GET['action']) || $_GET['action'] !== 'like_faq') {
    echo json_encode([
        "success" => false,
        "message" => "Invalid action"
    ]);
    exit;
}

if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid FAQ ID"
    ]);
    exit;
}

$id = (int) $_GET['id'];

try {
    $stmt = $pdo->prepare("UPDATE faqs SET likes_count = likes_count + 1 WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() === 0) {
        echo json_encode([
            "success" => false,
            "message" => "FAQ not found"
        ]);
        exit;
    }

    $stmt = $pdo->prepare("SELECT likes_count FROM faqs WHERE id = ?");
    $stmt->execute([$id]);
    $faq = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        "success" => true,
        "likes_count" => $faq['likes_count']
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Database error"
    ]);
}