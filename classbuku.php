<?php
declare(strict_types=1);

// Latihan 2: Class Buku dengan constructor dan method tampilInfo()
class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {}

    public function tampilInfo(): string {
        return "Judul: $this->judul | Penulis: $this->penulis | Tahun: $this->tahun";
    }
}

// Inisialisasi 3 objek buku dengan novel Indonesia
$buku1 = new Buku('Laskar Pelangi', 'Andrea Hirata', 2005);
$buku2 = new Buku('Bumi Manusia', 'Pramoedya Ananta Toer', 1980);
$buku3 = new Buku('Perahu Kertas', 'Dee Lestari', 2009);

echo "1. " . htmlspecialchars($buku1->tampilInfo()) . "<br>";
echo "2. " . htmlspecialchars($buku2->tampilInfo()) . "<br>";
echo "3. " . htmlspecialchars($buku3->tampilInfo()) . "<br>";