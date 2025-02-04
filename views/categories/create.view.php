<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
<h1>Izveido krutu categoriju</h1>

<form method="post">
    <label>Kaut kas:<input name="category_name" value="<?= $_POST['category_name'] ?? "" ?>"/>
    <button>Spied mani</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["category_name"])) { ?>
    <p><?= $errors["category_name"] ?></p>
<?php } ?>