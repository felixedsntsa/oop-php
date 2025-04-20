<?php 

// class komik

class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;
    // contruct class komik
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        // ambil constructor dari class produk / parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} | Rp{$this->harga}";
        return $str;
    }

    // menjalankan method abstract
    public function getInfoProduk() {
        $str = "Komik : " . $this->getInfo() . " | {$this->jmlHalaman} Halaman.";
        return $str;
    }
}