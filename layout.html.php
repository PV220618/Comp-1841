<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Trang chủ') ?></title>
    <link rel="stylesheet" href="/coursework/css/style.css">
</head>
<body>

<header>
    Questions & Answers System
    <center>
        <h4>
            <?php 
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['username'])) {
                echo "Welcome, " . htmlspecialchars($_SESSION['username']);
            } else {
                echo "Guest";
            }
            ?>
        </h4>
    </center>

    <?php if (isset($_SESSION['username'])): ?>
        <a href="/coursework/logout.php">Logout</a>
    <?php else: ?>
        <a href="/coursework/loginindex.php">Login</a>
    <?php endif; ?>
</header>

<nav>
    <ul>
        <li><a href="/coursework/index.php">🏠 Home</a></li>
        <li><a href="/coursework/questions.php">📜 Questions</a></li>
        <li><a href="/coursework/addquestion.php">➕ Add Question</a></li>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/coursework/admin/messages.php">Admin Dashboard</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/coursework/contactadmin.php">Contact Admin</a>
                </li>
            <?php endif; ?>

    </ul>
</nav>

<div class="content">
    <?= $output ?>

<footer>
    &copy; <?= date("Y") ?> GW student group
</footer>
</body>
</html>