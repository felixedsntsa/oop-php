<?php 

// class produk
class Produk {
    public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlHalaman,
    $waktuMain;
    
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} | Rp{$this->harga}";
        return $str;
    }
    
}

// class komik
class Komik extends Produk {
    public function getInfoProduk() {
        $str = "Komik : {$this->judul} | {$this->getLabel()} | Rp{$this->harga} | {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// class game
class Game extends Produk {
    public function getInfoProduk() {
        $str = "Game : {$this->judul} | {$this->getLabel()} | Rp{$this->harga} | {$this->waktuMain} jam.";
        return $str;
    }
}

class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} | Rp {$produk->harga}";
        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Honkai Star Rail", "HoYoverse", "HoYoverse",100000, 0, 100);


// Komik: Naruto | Masashi Kishimoto | Shoenn jump | Rp 30000 = 100 Halaman.
// Game: Honkai Star Rail | HoYoverse | HoYoverse | Rp 1000000 ~ 100 jam.

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();