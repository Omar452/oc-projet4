<?php

require_once('models/CommentsManager.php');
require_once('models/AdminManager.php');
require_once('models/ChaptersManager.php');
require_once('controllers/ChaptersController.php');

class CommentsController
{
    public function addComment(){

        $_SESSION["succes"] = "addComment";

        $_POST["pseudo"] = htmlspecialchars($_POST["pseudo"]);
        $_POST["comment"] = htmlspecialchars($_POST["comment"]);
    
        $commentsManager = new CommentsManager();
        $affectedLines = $commentsManager->createComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);

        $chaptersController = new ChaptersController();
    
        if ($affectedLines == false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=chapters&id=' . $_GET['id']);
        } 
    }
    
    public function signalComments(){

        $_SESSION["succes"] = "signalComment";
    
        $commentsManager = new CommentsManager();
        $affectedComment = $commentsManager->signalComment($_GET['id']);

        $chaptersController = new ChaptersController();
    
        if ($affectedComment == false) {
            throw new Exception('Impossible de signaler le commentaire !');
        }
        else {
            header('Location: index.php?action=chapters&id=' . $_GET['chapter_id']);
        } 
    }

    public function allowComment(){

        $_SESSION["succes"] = "allowComment";

        $commentsManager = new CommentsManager();
        $affectedComment = $commentsManager->allowComment($_GET["id"]);
    
        $chaptersManager = new ChaptersManager();
        $firstChapterId = $chaptersManager->getFirstChapterId();
    
        header('Location: index.php?action=adminChapter&id=' . $firstChapterId);
    }
    
    public function deleteComment(){

        $_SESSION["succes"] = "deleteComment";

        $commentsManager = new CommentsManager();
        $affectedComment = $commentsManager->deleteComment($_GET["id"]);
    
        $chaptersManager = new ChaptersManager();
        $firstChapterId = $chaptersManager->getFirstChapterId();
    
        header('Location: index.php?action=adminChapter&id=' . $firstChapterId);
    }

}