# Laravel Bank Sampah

Ini adalah source code website dan API dari aplikasi mobile flutter bank sampah. Karena keterbatasan device (Tidak punya device MAC), maka tidak dapat membuild untuk device IOS.

---

## Pemasangan

-   Clone repository

```bash
git clone https://github.com/lyrihkaesa/laravel-bank-sampah.git banksampah
```

Jika ingin clone branch `dev`:

```bash
git clone -b dev https://github.com/lyrihkaesa/laravel-bank-sampah.git banksampah
```

-   Install Depedency

```bash
composer install
```

```bash
npm install
```

```bash
npm run build
```

-   Copy `.env`

```bash
cp .env.example .env
```

-   Generate Key

```bash
php artisan key:generate
```

-   Atur Database pada `.env`

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

-   Migration dan Seeding

```bash
php artisan migrate --seed
```

```bash
php artisan migrate:fresh --seed
```

-   Jalankan server

```bash
php artisan serv
```
