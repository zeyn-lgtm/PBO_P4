<?php
declare(strict_types=1);

class Mahasiswa {
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1,
        public string $fakultas = "Belum diisi"
    ) {}

    public function profil(): string {
        return "$this->nim - $this->nama (Semester $this->semester) | Fakultas: $this->fakultas";
    }
}

$m1 = new Mahasiswa('2525252525', 'owi', 3);
$m2 = new Mahasiswa('2530521061', 'bahlul', 5, 'Sains dan Teknologi');

echo "Objek 1 (tanpa argumen fakultas): " . htmlspecialchars($m1->profil()) . "<br>";
echo "Objek 2 (dengan argumen fakultas): " . htmlspecialchars($m2->profil()) . "<br>";