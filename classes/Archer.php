<?php 

class Archer extends Character {
    public function __construct($pseudo) 
    {
        parent ::__construct($pseudo);
        $this->arrows = 3;
        $this->double = false;
        // balancing the game
        $this->atk = $this->atk *2; 
    }

    public function action($target) 
    {
        if ($this->arrows >= 2) {
            return $this->arrow($target);
        } else {
            return $this->dagger($target);
        }
    }
    
    public function arrow($target) 
    {
        $rand = rand(0, 10); 
        if ($rand >= 0 && $rand <= 4 || $this->double == true ) {
            if ($this->double == true) {
                $target->setHP($this->atk*2);
                $target->isAlive();
                $this->double = false;
                $this->arrows -= 2;
                $status = "$this->pseudo envoie deux flèches sur $target->pseudo qui a $target->lifePoint points de vie! Il lui reste $this->arrows flèches. <br>";
            } else {
                $target->setHP($this->atk);
                $target->isAlive();
                $this->arrows -= 1; 
                $status = "$this->pseudo attaque $target->pseudo qui a $target->lifePoint points de vie! Il lui reste $this->arrows flèches. <br>"; 
            }
        } else {
            $this->double = true;
            $status = "$this->pseudo se concentre pour sa prochaine attaque. <br>"; 
        }
        return $status;      
    }

    public function charge()
    {
        // Charge is up, send double damages
        $this->double = true;
        $status = "$this->pseudo se concentre pour sa prochaine attaque."; 
        return $status;
    }

    public function dagger($target) 
    {
        // no more arrows, use dagger
        $target->setHP($this->atk / 3);
        $target->isAlive();
        $status = "$this->pseudo, n'ayant plus de flèches, attaque avec sa dague $target->pseudo qui a $target->lifePoint points de vie! ";
        return $status;
    }

    public function setHP($damage) 
    {
        $this->lifePoint -= $damage;
        return;
    }

}