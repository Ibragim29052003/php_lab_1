<?php require dirname(__DIR__).'/header.php';?>
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getName();?></h5>
    <!-- <h6 class="card-subtitle mb-2 text-muted"><?//=$article->getAuthorId();?></h6> -->

    <!-- задание 3.1  -->
    <!-- получаем никнейм автора из объекта $author, который был передан в шаблон: $author->getNickName(). -->
    <!-- <h6 class="card-subtitle mb-2 text-muted"><//?=$author->getNickName();?></h6> -->

    <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickName();?></h6>

    <p class="card-text"><?=$article->getText();?></p>

    <!-- <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a> -->

    <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/edit" class="btn btn-primary">Article update</a>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/delete" class="btn btn-warning">Article delete</a>
    
  </div>
</div>

<!-- Форма добавления комментария -->
<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title">Add a Comment</h5>
        <form action="<?=dirname($_SERVER['SCRIPT_NAME']);?>/article/<?=$article->getId();?>/comments" method="post">
            <div class="form-group">
                <label for="comment_text">Comment:</label>
                <textarea class="form-control" id="comment_text" name="comment_text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<!-- Отображение существующих комментариев -->
<?php if (!empty($comments)): ?>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">Comments</h5>
            <?php foreach ($comments as $comment): ?>
                <div class="card" id="comment-<?=$comment->getId();?>">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted"><?=$comment->getAuthorId()->getNickName();?></h6>
                        <p class="card-text"><?=$comment->getText();?></p>
                        <p class="card-text"><small class="text-muted"><?=$comment->getCreatedAt();?></small></p>
                        <a href="<?=dirname($_SERVER['SCRIPT_NAME']);?>/comment/<?=$comment->getId();?>/edit" class="btn btn-sm btn-secondary">Edit</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php require dirname(__DIR__).'/footer.php';?>