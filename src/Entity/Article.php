<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

/** @ORM\Entity 
*/
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id_article;

    /**
     * @ORM\Column(type="string")
     */
    private string $title;

    /**
     * @ORM\Column(type="string")
     */
    private string $text;

    /**
     * @ORM\Column(type="integer")
     */
    private string $isbn;

        // /**
        //  * @ORM\ManyToOne(targetEntity="Author")
        //  * @ORM\JoinColumn(name="id", referencedColumnName="id")
        //  */
        // private Author $id ;

        // /**
        //  * @ORM\ManyToOne(targetEntity="Editor")
        //  * @ORM\JoinColumn(name="id_editor", referencedColumnName="id_editor")
        //  */
        // private Editor $id_editor;


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of isbn
     */ 
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */ 
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }


    public function __construct (string $title, string $text, int $isbn){
        $this->title = $title;
        $this->text = $text;
        $this->isbn = $isbn;
    }



}
