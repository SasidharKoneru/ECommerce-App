<!-- views/product/productList.php -->
<?php include 'views/layouts/header.php'; ?>

<h2>Product List</h2>

<div class="product-list">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="views/images/<?php echo $product['image']; ?>" alt="<?php echo $product['image']; ?>" class="cat-img" width="80%">
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['description']; ?></p>
            <p>Price: $<?php echo $product['price']; ?></p>
            <a href="index.php?action=addToCart&id=<?php echo $product['id']; ?>" class="add-to-cart">Add to Cart</a>
        </div>
    <?php endforeach;?>
</div>

<?php include 'views/layouts/footer.php';

