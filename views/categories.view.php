<?php require "components/header.php" ?>
<?php require "components/navbar.php" ?>

    <form>
        <input name='search_query' value=<?= $_GET["search_query"] ?? ""?>>
        <button>Meklē</button>
    </form>

    <ul>
        <?php foreach ($categories as $category) { ?>
            <li><?= $category['category_name'] ?></li>
        <?php } ?>
    </ul>

<?php require "components/footer.php" ?>
