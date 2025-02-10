<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>

<h1><?=($category["category_name"]) ?> </h1><a href="/categories/edit?id=<?= $category['id']?>">EDIT</a>
<form method="POST" action="/categories/delete">
    <input name="id" value ="<?= $category["id"]?>" type="hidden">
    <button>DELETE</button>
</form>
<?php require "views/components/footer.php" ?>