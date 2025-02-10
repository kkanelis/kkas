<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

<form method="POST">
    <input name="id" value = <?= $post["id"]?> type="hidden">
    <input name="content" value="<?= $post['content'] ?? "" ?>">
    <label for="category">Kategorija:</label>
        <select name="id" id="category">
            <?php foreach ($categories as $category): ?>
                <option value="<?= htmlspecialchars($category['id']) ?>" <?= $catevalue["category_name"] === $category["category_name"] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category["category_name"]) ?>
                </option>
            <?php endforeach; ?>
        </select>
    <button>REDIGE</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["content"])) { ?>
    <p><?= $errors["content"] ?></p>
<?php } ?>