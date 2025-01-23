<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

<form method="POST">
    <input name="id" value = <?= $post["id"]?> type="hidden">
    <input name="content" value="<?= $post['content'] ?? "" ?>">
    <button>REDIGE</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["content"])) { ?>
    <p><?= $errors["content"] ?></p>
<?php } ?>