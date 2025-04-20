<?php 

class Produk {
    public $judul,
    $penulis,
    $penerbit,
    $harga;

    public function getLabel() {
        return "$this->judul, $this->penulis, $this->penerbit";
    }
    
    public function __construct( $judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
}

$produk1 = new produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 250000);
$produk3 = new Produk("Dragon Ball", "akiru Tokiyama", "Shonen Jump", 30000);

echo "komik: " . $produk1->getLabel();
echo "<br>";
echo "Game: " . $produk2->getLabel();
echo "<br>";
echo "Komik: " . $produk3->getLabel();