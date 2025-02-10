<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
<h1><?=($post["content"]) ?> </h1>
<h2>Saturs: <?= $post["category_name"] ?? "Nav pievienots kategorija"?></h2><br>

<a href="/edit?id=<?= $post['id']?>">EDIT</a>


<form method="POST" action="/delete">

    <input name="id" value ="<?= $post["id"]?>" type="hidden">
    <button>DELETE</button>

</form>

<hr>

<h2>Komentēt</h2>

<from method="POST" action="/comments/create">

    <label>Autors:<input name="author"></label><br>
    <label>Komentārs:<input name="comment"></label><br>
    <button>Pievienot</button>

</form>

<?php require "views/components/footer.php" ?>