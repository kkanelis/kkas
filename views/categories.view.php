<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form>
    <input name='search_query' value=<?= $_GET["search_query"] ?? ""?>>
    <button>Meklē</button>
</form>

<ul>
    <?php foreach ($categories as $category) { ?>
        <li><?= $category['category_name'] ?></li>
    <?php } ?>
</ul>

</body>
</html>
