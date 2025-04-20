<?php 

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