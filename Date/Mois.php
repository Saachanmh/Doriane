<?php

namespace App\Date;

class Mois {

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', "Octobre", 'Novembre', "Décembre"];

    private $month;
    private $year;

    public function __construct(?int $month = null,?int $year = null)
    {
        if ($month < 1 || $month > 12) {
            throw new \Exception("le mois $month n'est pas valide");
        }
        if ($year < 1970) {
            throw new \Exception("l`'année est inférieure à 1970");
        }
        $this->month = $month;
        $this->year = $year;

    }

    public function toString (): string {
        return $this->mois[$this->mois - 1] . ' ' . $this->year;
    }

    public function getWeeks (): int
    {
        $start = new \DateTime("{$this->year}-{$this->month}-01");
        $end = (clone $start)->modify('+1 month -1 day');
        var_dump($start->format('W'), $end->format('W'));
        return intval($end->format('W')) - intval($start->format('W'));
    }
}
