<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/css/home.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    <?php include PATH . 'nav.php'; ?>
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?= ROOT ?>/foods">
                <input type="search" name="search" placeholder="Search for Food...">
                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php foreach($categories as $item): ?>
                <a href="<?= ROOT ?>/foods?category=<?= $item->category_name ?>">
                    <div class="box-3 float-container">
                        <img src="<?= ROOT ?>/uploads/categories_img/<?= $item->category_id ?>/<?= $item->category_img ?>" alt="<?= $item->category_img ?>" class="img-responsive img-curve">
                        <h3 class="float-text text-white"><?= $item->category_name ?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php if (is_array($products) && count($products) > 0): ?>
                <?php foreach($products as $item): ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php product_img_src($item->product_id, $item->product_img);  ?>" alt="<?= $item->product_img ?>" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?= $item->product_name ?></h4>
                            <p class="food-price">₱<?= $item->product_price ?></p>
                            <p class="food-detail"><?= $item->product_details ?></p>
                            <br>
                            <a href="<?= ROOT ?>/foods/add_order/<?= $item->product_id ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                No Result
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="<?= ROOT ?>/foods">See All Foods</a>
        </p>
    </section>
    <?php include PATH . 'social.php'; ?>
    <?php include PATH . 'footer.php'; ?>
</body>
</html>