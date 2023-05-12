<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Tournament
{

    /**
     * @var string
     */
    protected $result;

    protected $matches_scores;

    public function __construct()
    {
        $this->result = 'Team                           | MP |  W |  D |  L |  P';
        $this->matches_scores = [];
    }

    function orderByPoints($a, $b)
    {
        return $b['P'] - $a['P'];
    }

    function orderByName($a, $b)
    {
        print_r($b);
        ob_flush();
    }

    public function tally($scores)
    {
//        print_r($this->matches_scores);
//        ob_flush();

        if ($scores === '') {
            return $this->print_score();
        }

        $lines = explode("\n", $scores);

        $matchs = array();

        foreach ($lines as $line) {
            $data = explode(";", $line);
            $matches[] = array(
                'team1' => $data[0],
                'team2' => $data[1],
                'result' => $data[2]
            );
        }


        foreach ($matches as $match) {

            if (!array_key_exists($match['team1'], $this->matches_scores)) {
                $this->matches_scores[$match['team1']] = ['MP' => 0, 'W' => 0, 'D' => 0, 'L' => 0, 'P' => 0];
            }
            if (!array_key_exists($match['team2'], $this->matches_scores)) {
                $this->matches_scores[$match['team2']] = ['MP' => 0, 'W' => 0, 'D' => 0, 'L' => 0, 'P' => 0];
            }

            switch ($match['result']) {
                case 'win':
                    $this->add_score_to_matches($team = $match['team1'], $w = 1, $d = 0, $l = 0, $p = 3);
                    $this->add_score_to_matches($team = $match['team2'], $w = 0, $d = 0, $l = 1, $p = 0);
                    break;
                case 'loss':
                    $this->add_score_to_matches($team = $match['team2'], $w = 1, $d = 0, $l = 0, $p = 3);
                    $this->add_score_to_matches($team = $match['team1'], $w = 0, $d = 0, $l = 1, $p = 0);
                    break;
                case 'draw':
                    $this->add_score_to_matches($team = $match['team1'], $w = 0, $d = 1, $l = 0, $p = 1);
                    $this->add_score_to_matches($team = $match['team2'], $w = 0, $d = 1, $l = 0, $p = 1);
                    break;
            }
        }

        uasort($this->matches_scores, array('Tournament', 'orderByPoints'));
        $equipos = $this->matches_scores;
        uksort($this->matches_scores, function ($a, $b) use ($equipos) {
            if ($equipos[$a]["P"] === $equipos[$b]["P"]) {
                return strcmp($a, $b);
            }
        });


        return $this->print_score();
    }

    protected function add_score_to_matches($team = '', $w = 0, $d = 0, $l = 0, $p = 0)
    {
        $this->matches_scores[$team] = [
            'MP' => $this->matches_scores[$team]['MP'] + 1,
            'W' => $this->matches_scores[$team]['W'] + $w,
            'D' => $this->matches_scores[$team]['D'] + $d,
            'L' => $this->matches_scores[$team]['L'] + $l,
            'P' => $this->matches_scores[$team]['P'] + $p
        ];
    }

    protected function print_score()
    {

        foreach ($this->matches_scores as $key => $value) {
            $this->result .= PHP_EOL;
            $key = str_pad($key, 31, ' ', STR_PAD_RIGHT);
            $this->result .= $key . "|  " . $value['MP'] . ' |  ' . $value['W'] . ' |  ' . $value['D'] . ' |  ' . $value['L'] . ' |  ' . $value['P'];
        }

        return $this->result;
    }
}


