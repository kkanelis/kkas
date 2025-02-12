<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

<form method="POST">
    <input name="id" value="<?= htmlspecialchars($post["id"]) ?>" type="hidden">
    
    <input name="content" value="<?= htmlspecialchars($post['content'] ?? "") ?>">

    <label for="category">Kategorija:</label>
    <select name="category_id" id="category">
        <option value="" <?= ($catevalue["category_id"] === NULL) ? 'selected' : '' ?>>Nav Kategorijas</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['id']) ?>" 
                <?= ($catevalue["category_id"] == $category["id"]) ? 'selected' : '' ?>>
                <?= htmlspecialchars($category["category_name"]) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button>REDIĢĒ</button>
</form>

<?php if(isset($errors["content"])) { ?>
    <p><?= htmlspecialchars($errors["content"]) ?></p>
<?php } ?>

<?php require "views/components/footer.php" ?>