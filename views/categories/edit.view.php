<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

<form method="POST">
    <input name="id" value = <?= $category["id"]?> type="hidden">
    <input name="category_name" value="<?= $category['category_name'] ?? "" ?>">
    <button>REDIGE</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["category_name"])) { ?>
    <p><?= $errors["category_name"] ?></p>
<?php } ?>