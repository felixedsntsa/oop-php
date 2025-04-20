<?php 

require_once 'App/init.php';

// $produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
// $produk2 = new Game("Honkai Star Rail", "HoYoverse", "HoYoverse", 0, 100);
// $produk3 = new Komik("kimi No Nawa", "Makoto Shinkai", "Kadokawa", 90000, 300);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);
// $cetakProduk->tambahProduk($produk3);
// echo $cetakProduk->cetak();

use App\Service\User as ServiceUser;
new ServiceUser();

echo "<br>";

use App\Produk\User as ProdukUser;
new ProdukUser();