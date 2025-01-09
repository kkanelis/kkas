<?php require "components/header.php" ?>
<?php require "components/navbar.php" ?>
    <form>
        <input name='search_query' value=<?= $_GET["search_query"] ?? ""?>>
        <button>Meklē</button>
    </form>

    <?php if (count($posts) == 0) { ?>
        <p> Kreizij nekas te nav </p>
    <?php } ?>

    <ul>
        <?php foreach ($posts as $blogs) { ?>
            <li><?= $blogs['content'] ?></li>
        <?php } ?>
    </ul>

<?php require "components/footer.php" ?>