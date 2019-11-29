<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$lucie = new Warrior('Lucie');
$anto = new Mage('Anto');
$jon = new Archer('Jon');

// Characters attacking while both alive 
while ($lucie->isAlive() && $anto->isAlive() && $jon->isAlive()) {
    // alternately random
    $turn = rand(0, 60);
    if ($turn >= 0 && $turn <= 10) {
        // First Character attacking the 2nd
        echo $lucie->action($anto);
        // Check if target is alive
        if (!$anto->isAlive()) {
            echo '<br>';
            echo $anto->getName().' est KO!';
        }
        echo '<br>';
    } else if ($turn > 10 && $turn <= 20) {
        // Second Character attacking the third
        echo $anto->action($jon);
        // Check if target is alive
        if (!$jon->isAlive()) {
            echo '<br>';
            echo $jon->getName().' est KO!';
        };
        echo '<br>';
    } else if ($turn > 20 && $turn <= 30) {
        // Third Character attacking the first 
        echo $jon->action($lucie);
        // Check if target is alive 
        if (!$lucie->isAlive()) {
            echo '<br>';
            echo $lucie->getName().' est KO!';
        };
        echo '<br>';
    } else if ($turn > 30 && $turn <= 40) {
        // First character attacking the third
        echo $lucie->action($jon);
        // Check if target is alive
        if (!$jon->isAlive()) {
            echo '<br>';
            echo $jon->getName().' est KO!';
        }
        echo '<br>';
    } else if ($turn > 40 && $turn <= 50) {
        // Second character attacking the first
        echo $anto->action($lucie);
        // Check if target is alive
        if (!$lucie->isAlive()) {
            echo '<br>';
            echo $lucie->getName().' est KO!';
        }
        echo '<br>';
    } else {
        // Third character attacking the second 
        echo $jon->action($anto);
        // Check if target is alive
        if (!$anto->isAlive()) {
            echo '<br>';
            echo $anto->getName().' est KO!';
        }
        echo '<br>';
    }
}