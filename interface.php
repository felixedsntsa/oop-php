<?php 

// interface info produk
interface InfoProduk {
    public function getInfoProduk();
}

// class produk
abstract class Produk {
    protected $judul,
    $penulis,
    $penerbit,
    $harga,
    $diskon = 0;
    
    // construct class produk
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // method set judul
    public function setJudul($judul) {
        // validasi judul harus string
        if(!is_string($judul)) {
            throw new Exception(("Judul harus string!"));
        }
        $this->judul = $judul;
    }

    // method get judul
    public function getJudul() {
        return $this->judul;
    }

    // method set penulis
    public function setPenulis($penulis) {
        // validasi penulisa harus string
        if(!is_string($penulis)) {
            throw new Exception(("Penulis harus string!"));
        }
        $this->penulis = $penulis;
    }

    // method get penulis
    public function getPenulis() {
        return $this->penulis;
    }

    // method set penerbit
    public function setPenerbit($penerbit) {
        // validasi penulisa harus string
        if(!is_string($penerbit)) {
            throw new Exception(("Penerbit harus string!"));
        }
        $this->penerbit = $penerbit;
    }

    // method get penulis
    public function getPenerbit() {
        return $this->penerbit;
    }

    // method set diskon
    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    // method get diskon
    public function getDiskon() {
        return $this->diskon;
    }

    // mencegah harga diakses langsung dari luar class produk
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getLabel() {
        return "$this->penulis | $this->penerbit";
    }

    abstract public function getInfo();
    
}

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

class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk(Produk $produk) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "Daftar Produk : <br>";

        foreach($this->daftarProduk as $pr) {
            $str .= " - {$pr->getInfoProduk()} <br>";
        }

        return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Honkai Star Rail", "HoYoverse", "HoYoverse", 0, 100);
$produk3 = new Komik("kimi No Nawa", "Makoto Shinkai", "Kadokawa", 90000, 300);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
$cetakProduk->tambahProduk($produk3);
echo $cetakProduk->cetak();
