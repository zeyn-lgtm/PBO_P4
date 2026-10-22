<?php
declare(strict_types=1);

class LaporanMahasiswa {
    public function __construct(private string $nama) {}

    public function __call(string $method, array $args): mixed {
        if ($method === 'cetakRingkas' && count($args) === 0) {
            return 'Mahasiswa: ' . $this->nama;
        }
        throw new BadMethodCallException('Method tidak tersedia: ' . $method);
    }
}

$laporan = new LaporanMahasiswa('Alya');

echo "<b>1. Method yang diizinkan</b><br>";
echo htmlspecialchars($laporan->cetakRingkas()) . "<br><br>";

echo "<b>2. Method tidak dikenal</b><br>";
try {
    echo $laporan->cetakLengkap();
} catch (BadMethodCallException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br><br>";
}

echo "<b>3. Method diizinkan tapi pakai argumen</b><br>";
try {
    echo $laporan->cetakRingkas('tambahan');
} catch (BadMethodCallException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br>";
}