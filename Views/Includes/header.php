<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Inventory Management System</title>
</head>
<body>
    <header class="flex items-center justify-between bg-blue-600 shadow w-full h-20 px-4">
        <div class="font-bold text-2xl text-white">
            Inventory Management System
        </div>

        <div class="flex justify-center items-center font-bold gap-2">
            <span class="w-9 h-9 bg-white text-blue-600 rounded-full flex items-center justify-center">
                <?= strtoupper(substr($_SESSION['username'],0,1)) ?>
            </span>
            <span class="text-white text-md">
                <?= $_SESSION['username'] ?>
            </span>
        </div>
    </header>
</body>