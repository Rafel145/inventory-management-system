<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Login Inventory Management System</title>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Inventory Management System</h2>
            <p class="text-md text-center text-gray-500">Login to your account</p>
        </div>
    <div class="bg-white w-full max-w-md shadow rounded-lg py-6 px-8"> 
        <div class="text-md text-center">
            <?php if($error): ?>
                <p class="bg-red-100 text-red-600 px-4 py-3 rounded"> <?= $error ?></p>
            <?php elseif($success): ?>
                <p class="bg-green-100 text-green-700 px-4 py-3 rounded"> <?= $success ?></p>
            <?php endif ?>
        </div>
        
        <p class="text-xl text-gray-800 font-bold mb-5">Login</p>

        <form action="index.php?action=login" method="post">
            <div>
                <label for="username" class="text-sm text-gray-500">Username</label>
                <input type="text" id="username" name="username" class="w-full rounded border border-gray-300 px-2 py-3 mb-2" require>
            </div>
            <div>
                <label for="password" class="text-sm text-gray-500">Password</label>
                <input type="password" id="password" name="password" class="w-full rounded border border-gray-300 px-2 py-3 mb-2" require>
            </div>
            <button type="submit" class="w-full font-bold text-md text-white rounded bg-blue-600 mt-2 px-2 py-3 hover:bg-blue-800">Login</button>
        </form>

        <p class="text-sm text-gray-800 text-center mt-3">Don't have an account? <a href="index.php?action=registerform" class="hover:underline">Register here</a></p>
    </div>
    </div>
</body>
</html>