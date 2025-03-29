<?php require dirname(DIR, 2).'/templates/header.php'; ?>

<div class="container mt-4">
    <h2>Редактирование комментария</h2>

    <?php // Отображаем сообщение об ошибке, если оно есть ?>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php // Форма для редактирования комментария ?>
    <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comment/<?= $comment->getId() ?>/update" method="post">
        <div class="form-group">
            <?php // Метка для текстового поля ?>
            <label for="text" class="form-label">Текст комментария</label>
            <?php // Текстовое поле для ввода комментария ?>
            <textarea class="form-control" id="text" name="text" rows="5" required><?= 
                htmlspecialchars($comment->getText()) 
            ?></textarea>
        </div>

        <?php // Кнопка для отправки формы ?>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>

<?php require dirname(DIR, 2).'/templates/footer.php'; ?>

