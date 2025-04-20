<?php 

class Produk {
    public $judul,
    $penulis,
    $penerbit,
    $harga;

    public function getLabel() {
        return "$this->judul, $this->penulis, $this->penerbit";
    }
    public function sayhello() {
        return "Hello World";
    }
}

// $produk1 = new Produk();
// $produk1->judul = "Naruto";

// $produk2 = new Produk();
// $produk2->judul = "Uncharted";

$produk3 = new produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;

echo "komik : $produk3->judul, $produk3->penulis";
echo "<br>";
echo $produk3->getLabel();

echo "<hr>";

$produk4 = new Produk();
$produk4->judul = "Uncharted";
$produk4->penulis = "Neil Druckman";
$produk4->penerbit = "Sony Computer";
$produk4->harga = 250000;

echo "komik: " . $produk3->getLabel();
echo "<br>";
echo "Game: " . $produk4->getLabel();
