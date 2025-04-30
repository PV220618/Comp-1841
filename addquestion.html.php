<form action="addquestion.php" method="post" enctype="multipart/form-data">
    <label for="title">Question Title:</label>
    <input type="text" name="title" required>

    <label for="content">Question Content:</label>
    <textarea name="content" rows="3" cols="40" required></textarea>

    <label for="image">Upload Image:</label>
    <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">

    

    <label for="module_id">Module:</label>
    <select name="module_id" required>
        <option value="">-- Select Module --</option>
        <?php
        $modules = $pdo->query("SELECT id, module_name FROM modules")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($modules as $module) {
            echo '<option value="'.$module['id'].'">'.$module['module_name'].'</option>';
        }
        ?>
    </select>

    <input type="submit" name="submit" value="Add Question">
</form>
