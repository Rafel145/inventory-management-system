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

    <main class="bg-gray-100 flex-1 p-8">
        <div class="text-md text-center">
            <?php if(!empty($error)): ?>
                <p class="bg-red-100 text-red-600 px-4 py-3 rounded"> <?= $error ?></p>
            <?php elseif(!empty($success)): ?>
                <p class="bg-green-100 text-green-700 px-4 py-3 rounded"> <?= $success ?></p>
            <?php endif ?>
        </div>
        <div class="mb-8">
            <h1 class="text-3xl text-gray-900 font-bold mt-2">Log Stock</h1>
            <p class="text-md text-gray-600 mt-1">View and manage your stock movement history</p>
        </div>

        <div class="mt-10 flex justify-between">
            <a href="index.php?action=createformlogstock" class="bg-blue-600 rounded text-white font-bold px-4 py-3 hover:bg-blue-800">Add Stock Log</a>
            <form action="index.php?action=readlogstocks" method="GET">
                <input type="hidden" name="action" value="readlogstocks">
                <div class="space-x-2">
                    <select name="productid" id="productid" class="rounded-xl shadow px-5 py-3">
                        <option value="" <?= isset($_GET['productid']) && $_GET['productid'] == '' ? 'selected': '' ?>>All Products</option>
                        <?php foreach($products as $product): ?>
                            <option value="<?= $product['id'] ?>"  <?= isset($_GET['productid']) && $_GET['productid'] == $product['id'] ? 'selected': ''?>><?= $product['name'] ?>
                        <?php endforeach ?>
                    </select>
                    <select name="type" id="type" class="rounded-xl shadow px-5 py-3">
                        <option value="" <?= isset($_GET['type']) && $_GET['type'] == '' ? 'selected': '' ?>>All Types</option>
                        <option value="IN"  <?= isset($_GET['type']) && $_GET['type'] == 'IN' ? 'selected': ''?>>IN</option>
                        <option value="OUT"  <?= isset($_GET['type']) && $_GET['type'] == 'OUT' ? 'selected': ''?>>OUT</option>

                    </select>
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 rounded px-5 py-3 font-bold">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white shadow rounded-xl mt-6 flex">
            <table class="w-full">
                <thead class="bg-gray-50 border-t border-gray-200 ">
                    <tr>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">No</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Date</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Product</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Type</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Quantity</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Action</th>
                    </tr>
                </thead>

                <tbody class="border-gray-200">
                    <?php foreach($logs as $log): ?>
                    <tr>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $no++ ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $log['date'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $log['productname'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $log['type'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $log['quantity'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm space-x-1 border-t">
                            <a class="bg-red-600 hover:bg-red-800 text-white font-bold rounded px-3 py-2" href="index.php?action=deletelogstock&id=<?= $log['id']?>" onclick="return confirm('Are you sure you want to delete this log?.')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>


</div>
<?php 
    include 'Views/Includes/footer.php'
?>