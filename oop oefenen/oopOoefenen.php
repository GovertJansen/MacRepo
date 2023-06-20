<?php

class Persoon
{
    function __construct(
        private string $naam,
        private int $leeftijd,
        private string $geslacht,
        private string $isStudent,
        private float $gemCijfer,
    ) {
        $this->setNaam($naam);
    }

    function setNaam(string $naam)
    {
        if (strlen($naam) >= 4) {
            $this->naam = $naam;
        } else {
            echo "Name must be 4 char or longer";
        }
    }

    function setLeeftijd(int $leeftijd)
    {
        $this->leeftijd = $leeftijd;
    }

    function setGeslacht(string $geslacht)
    {

        $this->geslacht = $geslacht;
    }

    function setIsStudent(bool $isStudent)
    {
        $this->isStudent = $isStudent;
    }

    function setGemCijfer(float $gemCijfer)
    {
        $this->gemCijfer = $gemCijfer;
    }


    function getNaam()
    {
        return $this->naam;
    }

    function getleeftijd()
    {
        return $this->leeftijd;
    }

    function getgeslacht()
    {
        return $this->geslacht;
    }

    function getIsStudent()
    {
        return $this->isStudent;
    }
    function getGemCijer()
    {
        return $this->gemCijfer;
    }
}
$persoon1 = new Persoon('Govert', 16, 'Overig', "Ja", 5.6);
echo $persoon1->getNaam() . "\n";
echo $persoon1->getleeftijd() . "\n";
echo $persoon1->getgeslacht() . "\n";
echo $persoon1->getIsStudent() . "\n";
echo $persoon1->getGemCijer();
