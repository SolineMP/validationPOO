<?php

abstract class Character {
    protected $lifePoint = 100;
    protected $magicPoint = 15;
    protected $pseudo;
    protected $atk = 15;
    protected $alive = true;

    public function __construct($pseudo) 
    {
        $this->pseudo = $pseudo;
    }
    
    public function isAlive() 
    {
        if ($this->lifePoint <= 0) {
            $this->lifePoint = 0;
            $this->alive = false;
            $status = false;
        } else {
            $status = true;
        }
        return $status;
    }

    public function getName() 
    {
        return $this->pseudo;
    }
}