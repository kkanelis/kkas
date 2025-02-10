<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
<h1>hol hol</h1>

<form method="POST">
    <label>Kaut kas:<input name="content" value="<?= $_POST['content'] ?? "" ?>"/>
    <label>Kategorija:<select name="id">
        <?php foreach ($categories as $category) {?>
            <option name="id" value="<?= htmlspecialchars($category['id']) ?>">
                <?= $category["category_name"] ?></option>
        <?php } ?>
    </select>
    <button>Spied mani</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["content"])) { ?>
    <p><?= $errors["content"] ?></p>
<?php } ?>