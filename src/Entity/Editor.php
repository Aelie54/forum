<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM ;

/** @ORM\Entity 
*/
class Editor{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id_editor;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function __construct (int $id_editor, string $name){
    $this->id_editor = $id_editor;
    $this->name = $name;
    }


    /**
     * Get the value of id_editor
     */ 
    public function getId_editor()
    {
        return $this->id_editor;
    }
}