<?php
declare(strict_types=1);

class MahasiswaDinamis {
    private array $atributTambahan = [];

    public function __construct(public string $nim, public string $nama) {}

    public function __set(string $key, mixed $value): void {
        $diizinkan = ['hobi'];
        if (!in_array($key, $diizinkan, true)) {
            throw new InvalidArgumentException("Atribut '$key' tidak diizinkan");
        }
        $this->atributTambahan[$key] = $value;
        echo "[__set] Atribut '$key' diisi.<br>";
    }

    public function __get(string $key): mixed {
        echo "[__get] Membaca atribut '$key'.<br>";
        if (!array_key_exists($key, $this->atributTambahan)) {
            throw new OutOfBoundsException("Atribut '$key' tidak ditemukan");
        }
        return $this->atributTambahan[$key];
    }

    public function __isset(string $key): bool {
        echo "[__isset] Memeriksa atribut '$key'.<br>";
        return isset($this->atributTambahan[$key]);
    }

    public function __unset(string $key): void {
        echo "[__unset] Menghapus atribut '$key'.<br>";
        unset($this->atributTambahan[$key]);
    }
}

$mhs = new MahasiswaDinamis('231001', 'Alya');

echo "<b>1. Uji __set()</b><br>";
$mhs->hobi = 'Membaca';

echo "<br><b>2. Uji __get()</b><br>";
echo "Hobi: " . htmlspecialchars($mhs->hobi, ENT_QUOTES, 'UTF-8') . "<br>";

echo "<br><b>3. Uji __isset()</b><br>";
echo "isset(hobi)? " . (isset($mhs->hobi) ? 'Ya' : 'Tidak') . "<br>";

echo "<br><b>4. Uji __unset()</b><br>";
unset($mhs->hobi);
echo "isset(hobi) setelah unset? " . (isset($mhs->hobi) ? 'Ya' : 'Tidak') . "<br>";

echo "<br><b>5. Uji Atribut Tidak Diizinkan</b><br>";
try {
    $mhs->alamat = 'Sukabumi';
} catch (InvalidArgumentException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br>";
}