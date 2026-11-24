<?php 
    if(!isset($_SESSION['username'])){
        header("Location: index.php?action=index");
    }
    
    include 'Views/Includes/header.php';
?>

<div class="flex">
    <?php include 'Views/Includes/sidebar.php'  ?>


<main class="bg-gray-100 flex-1 p-8">
    <div class="text-md text-center">
            <?php if(!empty($error)): ?>
                <p class="bg-red-100 text-red-600 px-4 py-3 rounded"> <?= $error ?></p>
            <?php endif ?>
    </div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mt-2">Add Log Stock</h1>
    </div>

    <form action="index.php?action=createlogstock" method="post">

        <div class="space-y-2 mb-3">
            <label for="productid" class="text-md text-gray-600">Product:</label>
            <select name="productid" id="productid" class="rounded-xl shadow px-2 py-4 w-full">
                <option value="" disabled selected>Select Product</option>
                <?php foreach($products as $product): ?>
                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?>
                <?php endforeach ?>
            </select>
        </div>
        <div class="space-y-2 mb-3">
            <label for="type" class="text-md text-gray-600">Type:</label>
            <select name="type" id="type" class="rounded-xl shadow px-2 py-4 w-full">
                <option value="" disabled selected>Select Type</option>
                <option value="IN" >IN</option>
                <option value="OUT">OUT</option>
            </select>
        </div>

        <div class="space-y-2 mb-3">
            <label for="quantity" class="text-md txt-gray-600">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="rounded-xl shadow px-2 py-4 w-full">
        </div>
        <button class="bg-blue-600 rounded text-white font-bold mt-2 px-5 py-2" onclick="return confirm('Are you sure you want to add this category?')">Add</button>
    </form>
</main>

</div>
<?php 
    include 'Views/Includes/footer.php'
?>