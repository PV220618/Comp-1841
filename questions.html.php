<?php foreach ($questions as $question): ?>
    <blockquote>
        <h3>
            <a href="viewquestion.php?id=<?= $question['id']; ?>">
                <?= htmlspecialchars($question['title'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
        </h3>

        <?php if (!empty($question['image'])): ?>
            <div class="question-image">
                <img src="images/<?= htmlspecialchars($question['image']) ?>" 
                     alt="Question Image" 
                     width="100">
            </div>
        <?php else: ?>
            <p>No image</p>
        <?php endif; ?>

        <td>
            <strong>Posted by:</strong> 
            <?= htmlspecialchars($question['username'], ENT_QUOTES, 'UTF-8'); ?>
        </td>

        <?php
        if (!isset($_SESSION['user_id'])) {
            continue; 
        }

        $currentuser = $_SESSION['user_id'];
        $isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

        if ($question['user_id'] === $currentuser || $isAdmin) {
        ?>
            <a href="editquestion.php?id=<?= $question['id'] ?>">Edit</a>

            <form action="deletequestion.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="delete">Delete</button>
            </form>
        <?php
        }
        ?>
    </blockquote>
<?php endforeach; ?>