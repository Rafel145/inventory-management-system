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
            <h1 class="text-3xl text-gray-900 font-bold mt-2">Products</h1>
            <p class="text-md text-gray-600 mt-1">Products Manage your products</p>
        </div>

        <form action="index.php?action=readproducts" method="GET">
            <div class="flex gap-4">
            <input type="hidden" name="action" value="readproducts">
            <input value="<?= isset($_GET['name']) ? $_GET['name']: "" ?>"type="text" id="name" name="name" class="w-full rounded-xl border border-gray-200 px-5 py-3 w-10">
            <button type="submit" class="rounded text-white bg-blue-600 font-bold px-3 hover:bg-blue-800">Search</button>
            </div>
        </form>

        <div class="mt-10 flex justify-between">
            <a href="index.php?action=createformproduct" class="bg-blue-600 rounded text-white font-bold px-5 py-3 hover:bg-blue-800">Add product</a>
            <form action="index.php?action=readproducts" method="GET">
                <input type="hidden" name="action" value="readproducts">
                <div class="space-x-2">
                    <select name="categoryid" id="categoryid" class="rounded-xl shadow px-5 py-3">
                        <option value="" <?= isset($_GET['categoryid']) && $_GET['categoryid'] == '' ? 'selected': '' ?>>All Categories</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"  <?= isset($_GET['categoryid']) && $_GET['categoryid'] == $category['id'] ? 'selected': ''?>><?= $category['name'] ?>
                        <?php endforeach ?>
                    </select>
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 rounded px-5 py-3 font-bold">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white shadow rounded-xl mt-6 flex pb-2">
            <table class="w-full">
                <thead class="bg-gray-50 border-t border-gray-200 ">
                    <tr>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">No</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Product</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Category</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Buy price</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Sell price</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Stock</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200"><?= $no++ ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200"><?= $product['product'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200"><?= $product['category'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200"><?= $product['buyprice'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200"><?= $product['sellprice'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t border-gray-200"><?= $product['stock'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm space-x-1 border-t border-gray-200">
                            <a class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold rounded px-3 py-2" href="index.php?action=updateformproduct&id=<?= $product['id']?>">Edit</a> 
                            <a class="bg-red-600 hover:bg-red-800 text-white font-bold rounded px-3 py-2" href="index.php?action=deleteproduct&id=<?= $product['id']?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
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