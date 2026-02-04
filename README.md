# Ujian Kominfo - Portal Layanan Publik

Sebuah portal layanan publik yang dibangun dengan Laravel, Livewire, dan Tailwind CSS. Fitur meliputi manajemen kategori, layanan, carousel, dan sistem role-based access control (RBAC).

## Fitur Utama
- **Public**: Lihat daftar layanan berdasarkan kategori.
- **Auth**: Login via Google (OAuth) & Email Tradisional.
- **User Dashboard**: Cari dan telusuri layanan yang tersedia.
- **Admin Panel**: Manajemen Kategori, Layanan, Carousel, dan User Management.

## Prasyarat
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB (atau SQLite)

## Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/ujian-kominfo.git
   cd ujian-kominfo
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env` dan generates key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Sesuaikan konfigurasi database di `.env`.

4. **Konfigurasi Google OAuth**
   Dapatkan kredensial dari [Google Cloud Console](https://console.cloud.google.com/) dan tambahkan ke `.env`:
   ```env
   GOOGLE_CLIENT_ID=your-client-id
   GOOGLE_CLIENT_SECRET=your-client-secret
   GOOGLE_REDIRECT_URI="${APP_URL}/oauth/google/callback"
   ```

5. **Migrasi dan Seeding**
   Jalankan migrasi tabel dan seeder untuk akun admin:
   ```bash
   php artisan migrate
   php artisan db:seed --class=AdminSeeder
   ```

6. **Storage Link**
   Hubungkan storage untuk thumbnail layanan:
   ```bash
   php artisan storage:link
   ```

7. **Build Assets**
   ```bash
   npm run build
   ```

8. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```

## Akun Default (Seeder)
- **Admin**: `admin@admin.com` (Password: `password`)
- **User**: `user@user.com` (Password: `password`)

## Lisensi
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
