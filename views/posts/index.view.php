<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
    <form>
        <input name='search_query' value=<?= $_GET["search_query"] ?? ""?>>
        <button>Meklē</button>
    </form>

    <?php if (count($posts) == 0) { ?>
        <p> Kreizij nekas te nav </p>
    <?php } ?>

    <ul>
        <?php foreach ($posts as $blogs) { ?>
            <li><a href="show?id=<?= $blogs["id"] ?>"> <?= htmlspecialchars($blogs['content']) ?></a> </li>
        <?php } ?>
    </ul>

<?php require "views/components/footer.php" ?>