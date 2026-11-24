<?php 
    if(!isset($_SESSION['username'])){
        header("Location: index.php?action=index");
    }

    include 'Views/Includes/header.php';
?>
<div class="flex">
    <?php 
        include 'Views/Includes/sidebar.php'
    ?>
    
    <main class="p-8 flex-1 bg-gray-100">
        <div class="text-md text-center">
            <?php if(!empty($error)): ?>
                <p class="bg-red-100 text-red-600 px-4 py-3 rounded"> <?= $error ?></p>
            <?php elseif(!empty($success)): ?>
                <p class="bg-green-100 text-green-700 px-4 py-3 rounded"> <?= $success ?></p>
            <?php endif ?>
        </div>
        <div class="mb-8 mt-2">
            <h1 class="font-bold text-3xl text-gray-900">Dashboard</h1>
            <p class="text-gray-600 py-1">Welcome back, <?= $_SESSION['username'] ?>!</p>
        </div>

        <div class="grid grid-cols-1 grid-cols-4 gap-6 mb-8">
            <a href="index.php?action=readproducts" class="bg-white shadow rounded-xl p-6">
                <p class="text-md text-gray-500">Total Products </p>
                <h2 class="text-3xl text-gray-800 mt-2 font">
                    <?= $totalproducts ?>
                </h2>
            </a>
            <a href="index.php?action=readcategories" class="bg-white shadow rounded-xl p-6">
                <p class="text-md text-gray-500">Total Categories </p>
                <h2 class="text-3xl text-gray-800 mt-2">
                    <?= $totalcategories ?>
                </h2>
            </a">
            <a href="index.php?action=readlogstocks" class="bg-white shadow rounded-xl p-6">
                <p class="text-md text-gray-500">Low Stocks </p>
                <h2 class="text-3xl text-red-500 mt-2">
                    <?= $totallowstock ?>
                </h2>
            </a">
            <a href="index.php?action=readproducts" class="bg-white shadow rounded-xl p-6">
                <p class="text-md text-gray-500">Total Value </p>
                <h2 class="text-3xl text-gray-800 mt-2">
                    Rp<?= number_format($stockvalue,0, ",",".") ?>
                </h2>
            </a>
        </div>

        <div class="grid grid-cols-1 grid-cols-2 gap-6 items-start ">
            <div class="bg-white shadow rounded-xl pb-2">
                <div class="px-5 py-6">
                    <h2 class="text-lg text-gray-800 font-bold">Low Stock Products</h2>
                    <p class="text-sm text-gray-500">Stock of 5 or Less</p>
                </div>

                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200">Product Name</th>
                            <th class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200">Stock</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        <?php foreach($lowstock as $low): ?>
                        <tr>
                            <td class="px-6 py-3 text-gray-500 text-left border-t border-gray-200 text-sm">
                                <?= $low['name'] ?>
                            </td>
                            <td class="px-6 py-3 text-gray-500 border-t border-gray-200 text-left text-sm">
                                <?= $low['stock'] ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
            <div class="bg-white shadow rounded-xl pb-2">
                <div class="px-5 py-6">
                    <h2 class="text-lg font-bold text-grey-800">Stock Report</h2>
                    <p class="text-sm text-gray-500">Last 7 Days</p>
                </div>

                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200">Date</th>
                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200">Product</th>
                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200">Type</th>
                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200">Qty</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        <?php foreach($stockreport as $report):?>
                        <tr>
                            <td class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200"><?= $report['date'] ?></td>
                            <td class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200"><?= $report['product'] ?></td>
                            <td class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200"><?= $report['type'] ?></td>
                            <td class="px-6 py-3 text-sm text-left text-gray-500 border-t border-gray-200"><?= $report['quantity'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<?php 
    include 'Views/Includes/footer.php'
?>