<?php
    class Mobil
    {
        public $mobil = 'Xenia';

        public function __construct()
        {
            echo "<br/> ini adalah isi method construct <br/>";
        }

        public function __destruct()
        {
            echo "<br/> ini adalah isi method destruct <br/>";
        }

        public function getName()
        {
            return $this->mobil;
        }
    }

    $mobil = new Mobil;

    echo $mobil->getName();