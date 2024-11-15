<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cara Menjalankan Website
1. Nyalakan mySQL dan Apache di XAMPP
2. Lalu buka terminal VSC atau CMD
3. Masukkan "php artisan db:seed --class=MoveDataToItemsSeeder" pada terminal.
4. Lalu jalankan servernya, dengan memasukkan "php artisan serve"
5. Setelah itu, tahan 'ctrl' pada keyboard lalu klik "http://127.0.0.1:8000" yang merupakan hasil dari menjalankan servernya.
6. Kemudian, Anda akan diarahkan ke website servernya. Maka akan muncul error, maka dari itu tambahkan URL dengan /items. Seperti berikut ini "http://127.0.0.1:8000/items"
