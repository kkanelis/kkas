<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
    <form>
        <input name='search_query' value=<?= $_GET["search_query"] ?? ""?>>
        <button>Meklē</button>
    </form>

    <?php if (count($categories) == 0) { ?>
        <p> Kreizij nekas te nav </p>
    <?php } ?>

    <ul>
        <?php foreach ($categories as $categorys) { ?>
            <li><a href="show?id=<?= $categorys["id"] ?>"> <?= htmlspecialchars($categorys['category_name']) ?></a> </li>
        <?php } ?>
    </ul>

<?php require "views/components/footer.php" ?>