# Padanan (sebelumnya Glosarium)

Padanan adalah suatu daftar alfabetis istilah dalam suatu ranah pengetahuan tertentu yang dilengkapi dengan definisi untuk istilah-istilah tersebut. Biasanya glosarium ada di bagian akhir suatu buku dan menyertakan istilah-istilah dalam buku tersebut yang baru diperkenalkan atau paling tidak, tak umum ditemukan.

Lihat aplikasi pada [Padanan](https://padanan.aplikasi.live).

## Fitur Aplikasi
- Pencarian kata.
- Tambah kata dari kontributor.
- Daftar kategori glosari dan pencarian kategori.
- Manajemen kata dari halaman admin.
- Manahemen kategori dari halaman admin.
- Notifikasi pengguna.
- Dan berbagai fitur lainnya yang akan terus ditambahkan.

## Kebutuhan Sistem
- Apache atau Nginx Web Server.
- PHP >= 7.1.
- MySQL 5.7.x atau di atasnya.
- Redis Server.
- ElasticSearch (opsional).
- SQLite atau PDO.

## Instalasi
- Klon repositori [arvernester/padanan](https://github.com/arvernester/padanan) ke mesin lokal.
- Masuk ke direktori aplikasi dan perbarui librari dan kerangka kerja dengan perintah ```composer install``.
- Salin berkas ```.env.example``` menjadi ```.env```. Ubah beberapa pengaturan di dalam berkas tersebut, termasuk berkas pengaturan pangkalan data.
- Buat kunci enkripsi baru dengan perintah ```php artisan key:generate```.
- Jalankan perintah ```php artisan migrate -seed``` untuk membuat tabel baru beserta datanya pada pangkalan data.
- Jalankan built-in web server dengan perintah ```php artisan serve```.

Terakhir, akses aplikasi web melalui peramban dengan tautan ```http://localhost:8000```.

## Kompilasi Aset (JS, CSS, LESS, SASS, dst)
Secara bawaan, aplikasi web Padanan didistribusikan dengan aset yang sudah terkompilasi. Namun, Anda dapat mengkompilasi ulang aset apabila ada perubahan, baik itu perubahan pada aset yang sudah ada, maupun perubahan dengan menambahkan paket librari baru.

Instal terlebih dahulu NodeJS dan NPM (atau Yarn).

```
sudo apt install node npm
```

Untuk mengkompilasi ulang, jalankan perintah berikut.

```
npm run dev

// atau

yarn watch-poll
```

Sebelum aset didistribusikan, aset harus dikompilasi ulang dalam bentuk aset produksi.

```
npm run production

// atau

yarn production
```

## Pengembang
- Dedy Yugo Purwanto ([@arvernester](https://twitter.com/arvernester)).
