<?php 

// class game

class Game extends Produk implements InfoProduk {
    public $waktuMain;
    // construct class game
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        // ambil constructor dari class produk / parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} | Rp{$this->harga}";
        return $str;
    }

    // menjalankan method interface
    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " | {$this->waktuMain} jam.";
        return $str;
    }
}