<?php
namespace App\Controller;

use App\Helpers\EntityManagerHelpers as Em;
use Doctrine\ORM\EntityRepository ;
use Doctrine\ORM\Mapping\ClassMetadata;
use App\Entity\Article;


class ArticleController{
    const NEEDLES = [
    "title",
    "text", 
    "isbn"
    ];

    public static function index(){
        $entityManager = Em::getEntityManager();
    }



    public function show(string $sId) { 

        $entityManager = Em::getEntityManager();        

        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Commentaire"));

        $oCommentaire = $repository->find((int) $sId);

        print($oCommentaire->getTitle());
        print("  et  ");
        print($oCommentaire->getText());

    }



    public function add() { 
       
        $entityManager = Em::getEntityManager(); 
        
        foreach (self::NEEDLES as $value) {

            if(!array_key_exists($value, $_POST)) {
                $_SESSION["error"] = "?error=attention à remplir tous les champs";
                header("location: http://localhost/Airplanes/src/vues/addAirport.php");
                 
            }
            
            $_POST[$value] = htmlentities(strip_tags($_POST[$value])) ;
            $new_article = new Article ($_POST['title'],$_POST['text'], $_POST['isbn'],) ;
            
        }
        
        //var_dump($_POST['street']); die();
        $entityManager->persist($new_article);
        $entityManager->flush();

        header("location: http://localhost/forum/src/vues/addArticle.php");

    }



    public function modify(string $sId) { 
       
        $entityManager = Em::getEntityManager();        
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Article"));
        
        $oArticle = $repository->find((int) $sId);
        
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

            if($_POST["text"] !== $oArticle->getText()){
                $oArticle->setText($_POST['street']); 
            }

            if($_POST["title"] !== $oArticle->getTitle()){
                $oArticle->setTitle($_POST['nationality']);  
            }

            if($_POST["isbn"] !== $oArticle->getIsbn()){
                $oArticle->setIsbn($_POST['isbn']); 
            }


            $entityManager->persist($oArticle);
            $entityManager->flush();

        }
        

        include __DIR__."/../view/modifyarticle.php" ;

    }



    public function delete(string $sId)
    {
        $entityManager = Em::getEntityManager();        
        $repository = new EntityRepository($entityManager, new ClassMetadata("App\Entity\Article"));
        
        $oArticle = $repository->find($sId);

        $entityManager->remove($oArticle);

        $entityManager->flush();

    }
    

}
