<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM faqs");
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>FAQ App</title>
</head>

<body>

    <div class="container">
        <h2>Frequently Asked Questions</h2>

        <?php foreach ($faqs as $faq): ?>
            <div class="faq-card">
                <h3><?= htmlspecialchars($faq['title']) ?></h3>
                <p><?= htmlspecialchars(substr($faq['content'], 0, 120)) ?></p>

                <div class="like-section">
                    <span class="likes">
                        Likes:
                        <span id="likes-<?= $faq['id'] ?>">
                            <?= $faq['likes_count'] ?>
                        </span>
                    </span>

                    <button>
                        👍 Like
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>