<?php

class Mage extends Character {

    public function __construct($pseudo) 
    {
        parent ::__construct($pseudo);
        $this->magicPoint = $this->magicPoint *2;
        $this->shield = false;
    }

    public function action($target) 
    {
        $rand = rand(1, 100);
        if ($rand >= 1 && $rand <= 50) {
            return $this->shield();
        } elseif ($rand > 50 && $rand <= 100) {
            return $this->attack($target);
        }
    }
     
    public function attack($target) 
    {
        $rand = rand(1, 5);
        $manaAtk = rand(1, 17);
        if ($this->magicPoint >= $manaAtk) {
            $damage = $manaAtk * $rand;
            $target->setHP($damage);
            $this->magicPoint -= $manaAtk;
            $target->isAlive();
            $status = $this->getName().' attaque '.$target->getName().' qui a '.$target->lifePoint.' points de vie! Il reste'. $this->magicPoint.' PM à '.$this->getName().'!';
        } elseif ($this->magicPoint > 0){
            $damage = $this->magicPoint * $rand;
            $target->setHP($damage);
            $this->magicpoint = 0;
            $target->isAlive();
            $status = $this->getName().' attaque '.$target->getName().' qui a '.$target->lifePoint.' points de vie! Il reste'. $this->magicPoint.' PM à '.$this->pseudo.'!';
        } else {
            $status = $this->getName().' n\'a plus de mana, et ne peut pas attaquer!';
        }
        return $status;
    }

    public function shield() 
    {
        $this->shield = true;
        $status = $this->pseudo.' a activé son bouclier!';
        return $status;
    }

    public function setHP($damage) 
    {
        if ($this->shield == false) {
            // Shield down, take normal damage
            $this->lifePoint -= $damage;
        } elseif ($this->shield == true) {
            // Shield up, don't take damage and disable shield
            $this->shield = false;
        }
        return;
    }
}