# PHARMACY

Dự án quản lý nhà thuốc.

## Yêu cầu hệ thống

- PHP >= 8.1
- Composer
- MySQL hoặc Laragon

## Cài đặt

1. Clone repository

    ```bash
    https://github.com/easycomhr/intern2024.git
    ```

2. Cài đặt các gói phụ thuộc

    ```bash
    cd repository
    composer install
    ```

3. Sao chép tệp `.env.example` thành `.env` và cấu hình thông tin cơ sở dữ liệu

    ```bash
    cp .env.example .env
    ```

4. Tạo key ứng dụng

    ```bash
    php artisan key:generate
    ```

## Sử dụng các lệnh Artisan

### Tạo Migration

Để tạo migrate, sử dụng lệnh sau:

```bash
php artisan make:migration create_table_name_table
```

### Chạy Migration

Để chạy các migration, sử dụng lệnh sau:

```bash
php artisan migrate
```

### Tạo model và migration

Để tạo model và migration, sử dụng lệnh sau:

```bash
php artisan make:model ModelName -m
```

-m dùng để tạo migration

### Tạo Seeder

Để tạo seeder, sử dụng lệnh sau:

```bash
php artisan make:seeder SeederName
```

### Tạo nội dung cho seeder

Để tạo nội dung seeder, sử dụng lệnh sau:
Nội dung code sau được gõ trong hàm run

```bash

$list = [
    [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('password1234'),
    ],
];

DB::table('users')->insert($list);
```

### Chạy Seeder

Để chạy seeder

```bash
php artisan db:seed
```

Nếu muốn chạy một seeder cụ thể:

```bash
php artisan db:seed --class=SeederName
```

### Tạo Controller

Để tạo controller, sử dụng lệnh sau:

```bash
php artisan make:controller ControllerName
```

Nếu muốn tạo một controller với resource:

```bash
php artisan make:controller ControllerName --resource
```

### Tạo Route

Để tạo route, bạn cần chỉnh sửa tệp routes/web.php. Dưới đây là ví dụ về cách định nghĩa một route cơ bản:

```bash
Route::get('/path', [ControllerName::class, 'method']);
```

### Chạy ứng dụng

Để chạy ứng dụng, sử dụng lệnh sau:

```bash
php artisan serve
```

Ứng dụng sẽ được truy cập tại http://localhost:8000.
