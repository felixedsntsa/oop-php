<?php 

// class produk
class Produk {
    public $judul,
    $penulis,
    $penerbit;
    protected $diskon = 0;
    private $harga;
    
    // construct class produk
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    // mencegah harga diakses langsung dari luar class produk
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getLabel() {
        return "$this->penulis | $this->penerbit";
    }

    // method yang akan di override untuk class child
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} | Rp{$this->harga}";
        return $str;
    }
    
}

// class komik
class Komik extends Produk {
    public $jmlHalaman;
    // contruct class komik
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        // ambil constructor dari class produk / parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }
    // override method dari class produk / parent
    public function getInfoProduk() {
        $str = "Komik : " . parent::getInfoProduk() . " | {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

// class game
class Game extends Produk {
    public $waktuMain;
    // construct class game
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        // ambil constructor dari class produk / parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    // method untuk set diskon
    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }
    // override method dari class produk / parent
    public function getInfoProduk() {
        $str = "Game : " . parent::getInfoProduk() . " | {$this->waktuMain} jam.";
        return $str;
    }
}

class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk->judul} | {$produk->getLabel()} | Rp {$produk->harga}";
        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Honkai Star Rail", "HoYoverse", "HoYoverse", 100000, 100);


// Komik: Naruto | Masashi Kishimoto | Shoenn jump | Rp 30000 = 100 Halaman.
// Game: Honkai Star Rail | HoYoverse | HoYoverse | Rp 1000000 ~ 100 jam.

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

echo "<hr>";

$produk2->setDiskon(50);
echo $produk2->getHarga();