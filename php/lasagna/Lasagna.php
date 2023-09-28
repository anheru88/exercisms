<?php

declare(strict_types=1);

class Lasagna
{
    // Please define the 'expectedCookTime()' function

    public function expectedCookTime(): int
    {
        return 40;
    }

    // Please define the 'remainingCookTime($elapsed_minutes)' function

    public function remainingCookTime($elapsed_minutes): int
    {
        return $this->expectedCookTime() - $elapsed_minutes;
    }


    // Please define the 'totalPreparationTime($layers_to_prep)' function

    public function totalPreparationTime($layers_to_prep): int
    {
        return 2 * $layers_to_prep;
    }

    // Please define the 'totalElapsedTime($layers_to_prep, $elapsed_minutes)' function


    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        return $this->totalPreparationTime($layers_to_prep) + $elapsed_minutes;
    }


    // Please define the 'alarm()' function

    public function alarm(){
        return "Ding!";
    }
}
