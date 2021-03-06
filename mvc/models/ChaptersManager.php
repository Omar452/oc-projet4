<?php

require_once('Manager.php');

class ChaptersManager extends Manager
{
    public function getFirstChapterId()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id FROM chapters LIMIT 1');
        $id = $req->fetch();

        return intval($id);
    }

    public function getAllChapters()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM chapters');
        return $req;
    }

    public function getOneChapter($chapter_id)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('SELECT * FROM chapters WHERE id=?');
        $chapter->execute(array($chapter_id));
        return $chapter;
    }

    public function createChapter($chapter_title,$chapter_content)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare("INSERT INTO chapters(title, chapter) VALUES(:title, :chapter)");
        $chapter->execute(array(
            "title" => $chapter_title,
            "chapter" => $chapter_content
        ));
        return $last_id=$db->lastInsertId();
    }

    public function updateChapter($chapter_id,$chapter_title,$chapter_content)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('UPDATE chapters SET title = :title, chapter = :chapter WHERE id = :id');
        $chapter->execute(array(
            "title" => $chapter_title,
            "chapter" => $chapter_content,
            "id" => $chapter_id
        ));

    }

    public function deleteChapter($chapter_id)
    {
        $db = $this->dbConnect();
        $chapter = $db->prepare('DELETE FROM chapters WHERE id=?');
        $chapter->execute(array($chapter_id));
    }
}