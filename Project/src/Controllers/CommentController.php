<?php

namespace src\Controllers;

use Exceptions\NotFoundException;
use src\View\View;
use src\Models\Comments\Comment;
// use src\Models\Articles\Article;
use DateTime;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)) . '/templates');
    }

    // Метод для обработки POST-запроса на добавление комментария
    public function addComment(int $articleId)
    {
        // Проверяем, что запрос типа POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('HTTP/1.1 405 Method Not Allowed');
            echo 'Method Not Allowed';
            return;
        }

        // Получаем текст комментария из POST-запроса
        $commentText = $_POST['comment_text'] ?? '';

        // Валидация текста комментария (проверка на пустоту и длину)
        if (empty($commentText)) {
            //$_SESSION['comment_error'] = 'Comment text cannot be empty.';
            header("Location: /articles/$articleId");
            exit;
        }

        // Получаем ID пользователя
        $userId = 1; // Захардкодили ID пользователя

        // Создаем новый объект комментария
        $comment = new Comment();
        $comment->setArticleId($articleId);
        $comment->setAuthorId($userId);
        $comment->setText($commentText);
        $comment->setCreatedAt((new DateTime())->format('Y-m-d H:i:s')); // Устанавливаем текущую дату и время

        // Сохраняем комментарий в базе данных
        $comment->save();

        // Перенаправляем пользователя на страницу статьи с якорем для нового комментария
        header("Location: /articles/$articleId#comment-" . $comment->getId());
        exit;
    }


    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            throw new NotFoundException();
        }

        $this->view->renderHtml('/comment/edit.php', ['comment' => $comment]);
    }

    public function update(int $commentId)
    {
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            throw new NotFoundException();
        }

        $articleId = $comment->getArticleId();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment->setText($_POST['text']);
            $comment->save();
            header("Location: /articles/$articleId#comment-" . $comment->getId());
            exit();
        } else{
            $this->view->renderHtml('/comment/edit.php', ['comment' => $comment]);
        }

    }

        public function delete(int $commentId){
        $comment = Comment::getById($commentId);
        $articleId = $comment->getArticleId();
        $comment->delete();
        header("Location: /articles/$articleId");
    }
}
