<?php
class Animal {
    protected $nama;
    protected $jenis;
    
    public function __construct($nama, $jenis) {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }
    
    public function getInfo() {
        return "Hewan ini adalah " . $this->nama . " jenis " . $this->jenis . ".";
    }
}

class Cat extends Animal {
    public function __construct($nama) {
        parent::__construct($nama, "kucing");
    }
    
    public function getInfo() {
        return parent::getInfo() . " Kucing adalah hewan yang suka bermain dan bersih.";
    }
}

class Dog extends Animal {
    public function __construct($nama) {
        parent::__construct($nama, "anjing");
    }
    
    public function getInfo() {
        return parent::getInfo() . " Anjing adalah hewan yang setia dan cerdas.";
    }
}

// Membuat objek dari class Animal, Cat, dan Dog
$hewan1 = new Animal("Harimau", "karnivora");
$hewan2 = new Cat("Kitty");
$hewan3 = new Dog("Buddy");

// Memanggil method getInfo() untuk masing-masing objek
echo $hewan1->getInfo() . "<br>";
echo $hewan2->getInfo() . "<br>";
echo $hewan3->getInfo() . "<br>";

?>