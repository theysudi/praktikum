<?php
    class Mobil
    {
        public $mobil;

        public function setMobil($nama)
        {
            $this->mobil = $nama;
        }
    }

    class Jenis extends Mobil {
        public $jenis;

        public function setJenis($nama)
        {
            $this->jenis = $nama;
        }
    }

    $mobil = new Jenis;
    $mobil->setMobil('Rush');
    $mobil->setJenis('Toyota');
    echo $mobil->jenis . ' ' . $mobil->mobil;