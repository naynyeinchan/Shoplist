<?php
$products = file_get_contents("https://fakestoreapi.com/products/");
$products = json_decode($products);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.css">
    <title>Document</title>

</head>
<body>
<div class="container">
    <div class="row">
        <?php foreach ($products as $product):?>
            <div class="col-md-6 col-lg-4 mt-5">
                <div class="card h-100">
                    <div class="card-body">
                        <img src="<?= $product->image ?>" class="card-img h-50 d-block" alt="">
                        <p class="badge bg-secondary rounded-pill mt-3"><?= $product->category ?></p>
                        <p class="card-title fw-bold" style="height: 7%"><?= $product->title ?></p>
                        <div class="">
                            <?php
                            for ($i=1; $i<=5; $i++){
                                if ($i <= round($product->rating->rate)){
                                    echo "<i class='fa-solid fa-star text-warning'></i>";
                                }else{
                                    echo "<i class='fa-regular fa-star text-warning'></i>";
                                }
                            }
                            ?> / <?= $product->rating->count ?> Reviews
                        </div>
                        <div class="h-25 overflow-auto">
                            <p class="card-text text-black-50"><?= $product->description ?></p>
                        </div>
                        <div class="d-flex align-items-center" style="height: 9%">
                            <h3 class="me-auto my-auto">$<?= $product->price ?></h3>
                            <button class="bg-success bg-opacity-75 rounded-pill ms-auto px-2">BUY NOW!</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>


</body>
</html>