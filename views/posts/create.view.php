<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
<h1>hol hol</h1>

<form method="post">
    <label>Kaut kas:<input name="content" value="<?= $_POST['content'] ?? "" ?>"/>
    <button>Spied mani</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["content"])) { ?>
    <p><?= $errors["content"] ?></p>
<?php } ?>