<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

/** @ORM\Entity 
*/
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id_commentaire;

    /**
     * @ORM\Column(type="string")
     */
    private string $text_commentaire;

    /**
     * @ORM\Column(type="integer")
     */
    private string $note;

    /**
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private Author $id_author ;

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="id_editor", referencedColumnName="id_editor")
     */
    private Editor $id_article;

    /**
     * Get the value of text_commentaire
     */ 
    public function getText_commentaire()
    {
        return $this->text_commentaire;
    }

    /**
     * Set the value of text_commentaire
     *
     * @return  self
     */ 
    public function setText_commentaire($text_commentaire)
    {
        $this->text_commentaire = $text_commentaire;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }



    public function __construct (int $id_commentaire, Author $author_commentaire, Article $id_article, string $text_commentaire, int $note){

        $this->id_commentaire = $id_commentaire;
        $this->author_commentaire = $author_commentaire;
        $this->id_article = $id_article;
        $this->text_commentaire = $text_commentaire;
        $this->note = $note;

    }


}