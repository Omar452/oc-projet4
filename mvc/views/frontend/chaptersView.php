<?php

$title = "Chapitres - Jean Forteroche : Billet simple pour l'Alaska.";
$description = "Page présentant les chapitres du roman Billet simple pour l'Alaska de Jean Forteroche.";
?>


<?php ob_start(); ?>

<?php
    if (isset($_SESSION["succes"]))
    {
    ?>
        <div id="succesMessage" class="text-center alert alert-success alert-link m-3 p-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php
                switch($_SESSION["succes"])
                {
                    case "addComment":
                        echo "<p>Commentaire ajouté avec succès!</p>";
                        break;
                    case "signalComment":
                        echo "<p>Commentaire signalé avec succès!</p>";
                        break;
                }
            ?>
        </div> 
    <?php
    unset($_SESSION["succes"]);
    }
?>

<div id="chapter-div " class="col-sm-12 container">

    <div class="dropdown show my-4">

        <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false">CHAPITRES</a>
        

        <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php
            while($data = $allChaptersQuery->fetch())
            {
            ?>
                <a class="dropdown-item border-bottom" href='index.php?action=chapters&amp;id=<?php echo $data['id'];?>'><?php echo $data['title'];?></a> <br> 

            <?php
            }
            $allChaptersQuery->closeCursor();
            ?> 
        </div>
        
    </div>

    <!-- affiche le chapitre demandé -->
    <?php
    while($data2 = $chapterQuery->fetch())
    {
    ?>
        <div class="container-fluid text-justify">
            <h2> <?php echo $data2["title"];?> </h2>
            <p> <?php echo $data2["chapter"];?> </p>
        </div>      
    <?php
    }
    $chapterQuery->closeCursor();
    ?>
</div> 

<!-- affiche les commentaires en fonction du chapitre -->
<div class="container-fluid mb-5">
    <button id="comment-btn"  class="btn btn-warning mb-4 text-white">Voir les commentaires</button>

<?php
while($data3 = $commentsQuery->fetch())
{
?>
    <div class="commentaires">
        <p>Posté par : <?php echo htmlspecialchars($data3["pseudo"]);?>, le <?php echo $data3["date_fr"];?></p> <br>
        <p><?php echo htmlspecialchars($data3["comment"]);?></p> <br>
        <a class="badge badge-danger text-white" href="index.php?action=signalComment&amp;id=<?php echo $data3["id"]?>
        &amp;chapter_id=<?php echo $data3["chapter_id"]?>">Signaler le commentaire !</a>
    </div>
<?php
}
$commentsQuery->closeCursor();
?>
</div>

<div class="container-fluid">
    <button id="form-btn"  class="btn btn-info">Laisser un commentaire</button>
    <form id="comment-form"  method="post" action='index.php?action=addComment&amp;id=<?= $_GET["id"]?>'>
        <div class="form-group">
            <label for="pseudo">Votre pseudo:</label><br>
            <input id="pseudo" class="form-control" type="text" name="pseudo">
        </div>
        <div class="form-group">
            <label class="align-top" for="comment">Votre commentaire:</label><br>
            <textarea id="comment" class="form-control" name="comment" rows=3></textarea>
        </div>
        <input class="btn btn-info" id="submit" type="submit">
    </form> 
</div>
        

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>