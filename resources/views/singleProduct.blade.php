<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">

    <title>Display Single Product</title>
</head>
<body>

<div class="topNav">
<h1 class="licencePlate">BEEP BEEP TOOT TOOT!</h1>
</div>

        <div>
            <a href="/products"class="homePageButton">Return to Home Page </a>
        </div>

    <div class="singleProductLayout">
        
        <h1>{{ $product->name }}</h1>
        <p>Brand: {{ $product->brand }}</p>
        <p>Model: {{ $product->model }}</p>
        <p>Year: {{ $product->year }}</p>
        <p>{{ $product->description }}</p>
        <p>Colour: {{ $product->colour }}</p>
        <p>£{{ number_format ($product->price, 2) }}</p>
    </div>
        <div>
            <img src="{{ $product->image}}" alt="product image" title="product image" class="productImageLarge">
        </div>
           
    

</body>
</html>