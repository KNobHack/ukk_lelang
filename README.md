# ukk_lelang

ukk_lelang adalah project pribadi saya untuk menyelesaikan Uji Kompetensi Keahlian (UKK) di sekolah dengan menggunakan framework Laravel. Dan di publikasikan secara open source dengan tujuan pendidikan.

jangan tanya kenapa saya menggunakan underscore pada nama project XD.

## Installasi

**Gunakan package manager [composer](https://getcomposer.org/) untuk mendownload.**
```bash
composer create-project knobhack/ukk_lelang nama_folder
```

**Atau clone repositori ini**
```bash
git clone https://github.com/KNobHack/ukk_lelang.git
```

>jika mendownload via composer lewati langkah berikut

**Setelah di clone jalankan terminal/cmd dan cd ke folder project yang sudah di download**
```bash
cd path_folder
```

**Install dependensi php**
```bash
composer install
```

**Copy variabel env**
cmd
```cmd
copy .env.example .env
```
bash
```bash
cp .env.example .env
```

**Generate env key**
```bash
php artisan ket:generate
```

>Tidak di haruskan tapi bagus jika dilakukan

**Install dependensi node.js**
```bash
npm install
```

**Compile assets**
```bash
npm run dev
```

## Penggunaan
>Digunakan selayaknya framework laravel digunakan

1. Edit file .env
    * hubungkan ke database kosong
2. Jalankan migrasi database
```bash
php artisan migrate --seed
```
3. Jalankan server
```bash
php artisan serve
```

> Dummy email:dummy@example.com | pass:12345678 (admin)

## Contributing
Pull requests di bolehkan dan di apresiasi :).
