<?php require "views/components/header.php" ?>
<?php require "views/components/navbar.php" ?>
<h1><?=($post["content"]) ?> </h1>
<h2>Saturs: <?= $post["category_name"] ?? "Nav kategorija"?></h2><br>

<a href="/edit?id=<?= $post['id']?>">EDIT</a>

<form method="POST" action="/delete">

    <input name="id" value ="<?= $post["id"]?>" type="hidden">
    <button>DELETE</button>

</form>

<hr>

<?php foreach ($comments as $comment) { ?>
    <div class="comment-box">
        <p class="comment-author"><strong><?= htmlspecialchars($comment['author']) ?></strong> <span class="comment-date"><?= htmlspecialchars($comment['date']) ?></span></p>
        <p class="comment-text"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    </div>
<?php } ?>

<h2>Komentēt</h2>

<form method="POST" action="/comments/create">

    <input name="id" value ="<?= $post["id"]?>" type="hidden">
    <label>Autors:<input name="author"></label><br>
    <label>Komentārs:<input name="comment"></label><br>
    
    <button type="submit">KOMENTĒT</button>
</form>

<?php require "views/components/footer.php" ?>

<?php if(isset($errors["content"])) { ?>
    <p><?= $errors["content"] ?></p>
<?php } ?>