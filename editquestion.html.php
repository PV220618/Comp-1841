<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Question</title>
    <link rel="stylesheet" href="/coursework/css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Question</h2>

    <form action="editquestion.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($question['id']) ?>">

        <label for="title">Question Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($question['title']) ?>" required><br>

        <label for="content">Question Content:</label>
        <textarea name="content" id="content" rows="6" required><?= htmlspecialchars($question['content']) ?></textarea><br>

        <label for="image">Upload New Image (optional):</label>
    <input type="file" name="image" id="image">

    <?php if (!empty($question['image']) && file_exists('images/' . $question['image'])): ?>
        <p>Current Image:</p>
        <img src="images/<?= htmlspecialchars($question['image']) ?>" alt="Current Image" style="max-width: 200px;">
    <?php else: ?>
        <p>No image available.</p>
    <?php endif; ?>



        <label for="module">Module:</label>
        <select name="module_id" id="module" required>
            <option value="">-- Select Module --</option>
            <?php foreach ($modules as $module): ?>
                <option value="<?= $module['id'] ?>"
                    <?= ($module['id'] == $question['module_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($module['name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Update Question</button>
    </form>

    <a href="questions.php">← Back to Question List</a>
</div>

</body>
</html>