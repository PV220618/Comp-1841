<php?>
<blockquote>
    <h3>
        <?= htmlspecialchars($question['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h3>

    <p><?= nl2br(htmlspecialchars($question['content'], ENT_QUOTES, 'UTF-8')); ?></p>

    <p>
        <?php if (!empty($question['image'])): ?>
            <img src="images/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Question Image" width="600">
        <?php else: ?>
            No Image
        <?php endif; ?>
    </p>

    <p><strong>Posted on:</strong> <?= htmlspecialchars($question['postdate'], ENT_QUOTES, 'UTF-8'); ?></p>

    <p><strong>By:</strong> 
        <?php if ( !empty($question['username'])): ?>
                <?= htmlspecialchars($question['username'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
        <?php else: ?>
            Unknown User
        <?php endif; ?>
    </p>

    <a href="questions.php" class="btn-back">← Back to Questions</a>
</blockquote>
</php>