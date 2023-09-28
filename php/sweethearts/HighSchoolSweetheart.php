<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return $name[0];
    }

    public function initial(string $name): string
    {
        return strtoupper($this->firstLetter($name)).'.';
    }

    public function initials(string $name): string
    {
        $names = explode(" ", $name);

        $initials = "";

        foreach ($names as $name) {
            $initials .= $this->initial($name)." ";
        }

        return substr($initials, 0, -1);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $format =
            '     ******       ******
   **      **   **      **
 **         ** **         **
**            *            **
**                         **
**     %s  +  %s     **
 **                       **
   **                   **
     **               **
       **           **
         **       **
           **   **
             ***
              *';

        return sprintf($format, $this->initials($sweetheart_a), $this->initials($sweetheart_b));
    }
}
