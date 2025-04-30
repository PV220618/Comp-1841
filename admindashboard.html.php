<h2>List messages from user</h2>

<ul class="list-group">
    <?php foreach ($messages as $msg): ?>
        <li class="list-group-item">
            <strong><?= htmlspecialchars($msg['username']) ?></strong> - <?= htmlspecialchars($msg['created_at']) ?><br>
            <p><?= nl2br(htmlspecialchars($msg['message'])) ?></p>

            <?php if (!empty($msg['reply'])): ?>
                <div class="alert alert-info mt-2">
                    <strong>Trả lời:</strong><br>
                    <?= nl2br(htmlspecialchars($msg['reply'])) ?>
                </div>
            <?php endif; ?>

            <form method="post" action="../admin/reply-message.php">
                <input type="hidden" name="id" value="<?= $msg['id'] ?>">
                <div class="mt-2">
                    <label for="reply" class="form-label">Answer:</label>
                    <textarea name="reply" class="form-control" rows="3"><?= htmlspecialchars($msg['reply']) ?></textarea>
                    <button type="submit" class="btn btn-success mt-2">Save</button>
                </div>
            </form>
        </li>
    <?php endforeach; ?>
</ul>