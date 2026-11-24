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
            <h1 class="text-3xl text-gray-900 font-bold mt-2">Categories</h1>
            <p class="text-md text-gray-600 mt-1">Products Manage your Categories</p>
        </div>

        <form action="index.php?action=readcategories" method="GET">
            <div class="flex gap-4">
            <input type="hidden" name="action" value="readcategories">
            <input value="<?= isset($_GET['name']) ? $_GET['name']: "" ?>"type="text" id="name" name="name" class="w-full rounded-xl border border-gray-200 px-5 py-3 w-10">
            <button type="submit" class="rounded text-white bg-blue-600 font-bold px-3 hover:bg-blue-800">Search</button>
            </div>
        </form>

        <div class="mt-10 flex">
            <a href="index.php?action=createformcategory" class="bg-blue-600 rounded text-white font-bold px-4 py-3 hover:bg-blue-800">Add Category</a>
        </div>

        <div class="bg-white shadow rounded-xl mt-6 flex pb-2">
            <table class="w-full">
                <thead class="bg-gray-50 border-t border-gray-200 ">
                    <tr>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">No</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Category</th>
                        <th class="px-6 py-3 text-gray-500 text-left text-sm">Action</th>
                    </tr>
                </thead>

                <tbody class="border-gray-200">
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $no++ ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm border-t"><?= $category['name'] ?></td>
                        <td class="px-6 py-3 text-gray-500 text-left text-sm space-x-1 border-t">
                            <a class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold rounded px-3 py-2" href="index.php?action=updateformcategory&id=<?= $category['id']?>">Edit</a> 
                            <a class="bg-red-600 hover:bg-red-800 text-white font-bold rounded px-3 py-2" href="index.php?action=deletecategory&id=<?= $category['id']?>" onclick="return confirm('Are you sure you want to delete this category?\n\nPlease make sure there are no products in this category before deleting it.')">Delete</a>
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