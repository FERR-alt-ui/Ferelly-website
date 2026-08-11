<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'portofolio_jawa');

function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
    return $pdo;
}

function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

$profile = [
    'nama'          => 'Nama Kamu',
    'panggilan'     => 'Kamu',
    'role'          => 'Web Developer & UI/UX Designer',
    'brand'         => 'namakamu.dev',
    'tagline'       => 'Pekerja yang setiap hari menembus jalanan Jabodetabek — kantor di Jakarta, klien di Tangerang, produksi di Bekasi, hingga meeting di Bogor.',
    'deskripsi_seo' => 'Portofolio web developer dan UI/UX designer yang bekerja keliling Jabodetabek.',
    'email'         => 'halo@namakamu.dev',
    'lokasi'        => 'Depok, Jabodetabek',
    'github'        => 'https://github.com/namakamu',
    'linkedin'      => 'https://www.linkedin.com/in/namakamu',
    'instagram'     => 'https://www.instagram.com/namakamu',
    'tentang'       => 'Saya web developer yang bekerja di lapangan: setiap hari mendatangi klien, kantor, dan lokasi proyek di seluruh Jabodetabek. Setiap daerah punya ceritanya — Jakarta pusat meeting dan kantor, Tangerang tempat klien industri dan studio, Bekasi tempat gudang dan produksi, Depok tempat saya tinggal, Bogor tempat meeting dengan pelanggan lama, dan Karawang tempat proyek kawasan industri. Peta ini adalah peta perjalanan harian saya.',
    'stats'         => [
        ['angka' => '20+',  'label' => 'Proyek Selesai'],
        ['angka' => '4',    'label' => 'Tahun Pengalaman'],
        ['angka' => '12+',  'label' => 'Klien Puas'],
        ['angka' => '6',    'label' => 'Daerah Jabodetabek'],
    ],
    'keahlian' => [
        ['nama' => 'HTML & CSS',           'level' => 92],
        ['nama' => 'JavaScript',           'level' => 86],
        ['nama' => 'PHP & MySQL',          'level' => 88],
        ['nama' => 'Laravel',              'level' => 80],
        ['nama' => 'React',                'level' => 75],
        ['nama' => 'UI/UX Design (Figma)', 'level' => 85],
        ['nama' => 'Tailwind CSS',         'level' => 84],
        ['nama' => 'Git & Kolaborasi',     'level' => 82],
    ],
    'pengalaman' => [
        ['tahun' => '2023 – Sekarang', 'kota' => 'Jakarta',  'peran' => 'Web Developer',       'tempat' => 'Kantor Pusat Startup Teknologi', 'deskripsi' => 'Membangun sistem internal dan dashboard untuk perusahaan rintisan; rapat dan sprint di kantor Jakarta.'],
        ['tahun' => '2022 – 2023',     'kota' => 'Tangerang', 'peran' => 'Frontend Developer',  'tempat' => 'Studio Digital Klien Industri',  'deskripsi' => 'Merancang dan membangun website untuk klien industri di kawasan Tangerang; sering bertemu langsung di lokasi klien.'],
        ['tahun' => '2021 – 2022',     'kota' => 'Bekasi',    'peran' => 'Web Developer',       'tempat' => 'Perusahaan Manufaktur',         'deskripsi' => 'Mengembangkan sistem inventori dan portal karyawan sambil rutin ke gudang produksi di Bekasi.'],
    ],
    'pendidikan' => [
        ['tahun' => '2016 – 2020', 'kota' => 'Depok',    'jenjang' => 'S1 Teknik Informatika', 'tempat' => 'Universitas Indonesia'],
        ['tahun' => '2013 – 2016', 'kota' => 'Jakarta',  'jenjang' => 'SMA IPA',                'tempat' => 'SMA Negeri 8 Jakarta'],
    ],
];

$proyek = [
    [
        'judul'   => 'Sistem Informasi Akademik Sekolah',
        'kota'    => 'Jakarta',
        'tahun'   => '2024',
        'kategori'=> 'Web App',
        'deskripsi' => 'Manajemen data siswa, nilai, dan jadwal untuk sekolah di Jakarta dengan role-based access.',
        'teknologi' => ['Laravel', 'MySQL', 'Bootstrap'],
    ],
    [
        'judul'   => 'Aplikasi Kasir UMKM',
        'kota'    => 'Tangerang',
        'tahun'   => '2023',
        'kategori'=> 'Web App',
        'deskripsi' => 'Point-of-sale untuk sentra kuliner Tangerang dengan laporan penjualan harian dan cetak struk otomatis.',
        'teknologi' => ['PHP', 'MySQL', 'Tailwind CSS'],
    ],
    [
        'judul'   => 'E-Commerce Kuliner Kampus',
        'kota'    => 'Depok',
        'tahun'   => '2024',
        'kategori'=> 'E-Commerce',
        'deskripsi' => 'Toko online kuliner sekitar kampus Depok lengkap dengan keranjang, checkout, dan manajemen stok.',
        'teknologi' => ['Laravel', 'MySQL', 'AJAX'],
    ],
    [
        'judul'   => 'Website Wisata Kebun Raya',
        'kota'    => 'Bogor',
        'tahun'   => '2025',
        'kategori'=> 'Web App',
        'deskripsi' => 'Portal informasi wisata Bogor dengan peta interaktif dan sistem reservasi tiket.',
        'teknologi' => ['React', 'PHP', 'Leaflet'],
    ],
    [
        'judul'   => 'Dashboard Inventori Gudang',
        'kota'    => 'Bekasi',
        'tahun'   => '2025',
        'kategori'=> 'Dashboard',
        'deskripsi' => 'Monitoring stok gudang produksi Bekasi secara real-time dengan notifikasi minimum stock.',
        'teknologi' => ['PHP', 'Chart.js', 'MySQL'],
    ],
    [
        'judul'   => 'Landing Page Coworking Space',
        'kota'    => 'Tangerang Selatan',
        'tahun'   => '2023',
        'kategori'=> 'Landing Page',
        'deskripsi' => 'Landing page coworking space di BSD dengan kalender sewa ruang meeting online.',
        'teknologi' => ['HTML', 'CSS', 'JavaScript'],
    ],
    [
        'judul'   => 'Aplikasi Rental Kendaraan',
        'kota'    => 'Karawang',
        'tahun'   => '2024',
        'kategori'=> 'Mobile-first Web',
        'deskripsi' => 'Penyewaan kendaraan untuk pekerja kawasan industri Karawang dengan pelacakan status.',
        'teknologi' => ['Laravel', 'MySQL', 'Bootstrap'],
    ],
];
