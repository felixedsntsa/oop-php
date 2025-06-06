<?php 

class Produk {
    public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlHalaman,
    $waktuMain,
    $tipe;
    
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} | Rp{$this->harga}";
        if ($this->tipe == "komik") {
            $str .= " | {$this->jmlHalaman} Halaman.";
        } else if ($this->tipe == "game") {
            $str .= " | {$this->waktuMain} Jam.";
        }
        return $str;
    }
    
}

class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} | Rp {$produk->harga}";
        return $str;
    }
}

$produk1 = new produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "komik");
$produk2 = new Produk("Honkai Star Rail", "HoYoverse", "HoYoverse",100000, 0, 100, "game");


// Komik: Naruto | Masashi Kishimoto | Shoenn jump | Rp 30000 = 100 Halaman.
// Game: Honkai Star Rail | HoYoverse | HoYoverse | Rp 1000000 ~ 100 jam.

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();