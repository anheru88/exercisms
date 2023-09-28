<?php

class PizzaPi
{
    public function calculateDoughRequirement($numberOfPizzas, $numberOfPersons)
    {
        return $numberOfPizzas  * (($numberOfPersons * 20) + 200);

    }

    public function calculateSauceRequirement($numberOfPizzas, $saucePerPizza)
    {
       return  $numberOfPizzas * 125 / $saucePerPizza;
    }

    public function calculateCheeseCubeCoverage($cheeseDimension, $cheeseLayer, $pizzaDimension)
    {
        return floor(pow($cheeseDimension, 3) / ($cheeseLayer * pi() * $pizzaDimension));
    }

    public function calculateLeftOverSlices($numberOfPizzas, $numberOfFriends)
    {
       return ($numberOfPizzas * 8) % $numberOfFriends;
    }
}
