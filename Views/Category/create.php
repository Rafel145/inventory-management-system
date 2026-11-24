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
        <h1 class="text-3xl font-bold text-gray-900 mt-2">Add Category</h1>
    </div>

    <form action="index.php?action=createcategory" method="post">
        <div class="space-y-2 mb-3">
            <label for="name" class="text-md text-gray-600">Name:</label>
            <input type="text" name="name" id="name" class="w-full rounded bg-white shadow py-4 px-2">
        </div>
        <button class="bg-blue-600 rounded text-white font-bold mt-2 px-5 py-2" onclick="return confirm('Are you sure you want to add this category?')">Add</button>
    </form>
</main>

</div>
<?php 
    include 'Views/Includes/footer.php'
?>