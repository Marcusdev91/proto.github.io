<?php
require_once "includes/header.php";
require_once "includes/dbcon.inc.php";

try {
    // Query to fetch data from the bulletin table
    $stmt = $db->query('SELECT * FROM bulletin');
    $bulletins = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News and Announcements</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <nav> 
        <a href="index.html">Home</a> 
    </nav>

    <h1><i>News and Announcements</i></h1>
    <?php if (!empty($bulletins)): ?>
        <?php foreach ($bulletins as $bulletin): ?>
            <section>
                <h2><?php echo htmlspecialchars($bulletin['header'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <h3><?php echo htmlspecialchars($bulletin['date'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <h4><?php echo htmlspecialchars($bulletin['author'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <article>
                    <p><?php echo nl2br(htmlspecialchars($bulletin['article'], ENT_QUOTES, 'UTF-8')); ?></p>
                </article>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No news and announcements available.</p>
    <?php endif; ?>
</body>
</html>
