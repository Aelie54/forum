<?php
namespace App\Controller;

use App\Helpers\EntityManagerHelpers as Em;
use Doctrine\ORM\EntityRepository ;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Entity\Commentaire;


class CommentaireController{
    const NEEDLES = [
        "text_commentaire",
        "note", 
    ];

    public static function index(){
        $entityManager = Em::getEntityManager();
    }



    public function show(string $sId) { 

        $entityManager = Em::getEntityManager();        

        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Commentaire"));

        $oCommentaire = $repository->find((int) $sId);

        print($oCommentaire->getText_commentaire());
        print("  et  ");
        print($oCommentaire->getNote());

    }



    public function add() { 
       
        $entityManager = Em::getEntityManager(); 
        
        foreach (self::NEEDLES as $value) {

            if(!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "?error=attention à remplir tous les champs";
                header("location: http://localhost/forum/src/view/addcommentaire.php");
                 
            }
            
            $_POST[$value] = htmlentities(strip_tags($_POST[$value])) ;
            $new_commentaire = new Commentaire ($_POST['text_commentaire'],$_POST['note']) ;
            
        }
        
        //var_dump($_POST['street']); die();
        $entityManager->persist($new_commentaire);
        $entityManager->flush();

        include (__DIR__."../view/addcommentaire.php");
        //header("location: http://localhost/forum/src/view/addcommentaire.php");

    }



    public function modify(string $sId) { 
       
        $entityManager = Em::getEntityManager();        
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Commentaire"));
        
        $oCommentaire = $repository->find((int) $sId);
        
        if(!empty($_POST)){
            
            //je verifie que mes clés existe selon needles
            foreach (self::NEEDLES as $value){
                $exist = array_key_exists($value, $_POST);
                if($exist === false){
                    echo "erreur" ;
                    die;
                } 

                //je securise mes $_post
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value]))) ;
            }

            if($_POST["text_commentaire"] !== $oCommentaire->getText_commentaire()){
                $oCommentaire->setText_commentaire($_POST['text_commentaire']); 
            }

            if($_POST["note"] !== $oCommentaire->getNote()){
                $oCommentaire->setNote($_POST['note']);  
            }



            $entityManager->persist($oCommentaire);
            $entityManager->flush();

        }

        include '../forum/src/view/modifycommentaire.php' ;

    }



    public function delete(string $sId)
    {
        $entityManager = Em::getEntityManager();        
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Commentaire"));
        
        $oCommentaire = $repository->find($sId);

        $entityManager->remove($oCommentaire);

        $entityManager->flush();

    }
    

}