<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>All products</title>
</head>
<body>



<div class="backgroundImage">

<div class="topNav">
<h1 class="licencePlate">BEEP BEEP TOOT TOOT!</h1>
</div>

    <div class="sidebar">

  

        <div class="filters">
        <p class="filterTitle">FILTER CARS BY PRICE</p>
            <div class="checkbox">
                <label><input type="checkbox"  onchange="filterProductsCheckboxes()" data-range="all" checked> All Cars </label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"  onchange="filterProductsCheckboxes()" data-range="under10000"> All cars under £10,000 </label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"  onchange="filterProductsCheckboxes()" data-range="under30000"> All cars under £30,000</label>
            </div> 
            <div class="checkbox">
                <label><input type="checkbox"  onchange="filterProductsCheckboxes()" data-range="under50000"> All cars under £50,000</label>
            </div> 
            <div class="checkbox">
                <label><input type="checkbox"  onchange="filterProductsCheckboxes()" data-range="under100000"> All cars under £100,000</label>
            </div> 
            <div class="checkbox">
                <label><input type="checkbox"  onchange="filterProductsCheckboxes()" data-range="over100000"> All cars over £100,000</label>
            </div> 
        </div>

        <div class="filter-container">
            <p class="filterTitle">FILTER BY COLOUR</p>
            <div>
                <button onclick="filterProducts('all')" class="filterButton">ALL COLOURS</button>
            </div>
            <div>
                <button onclick="filterProducts('Red')" class="filterButton">RED CARS</button>
            </div>
            <div>
                <button onclick="filterProducts('White')"class="filterButton" >WHITE CARS</button>
            </div>
            <button onclick="filterProducts('Blue')" class="filterButton">BLUE CARS</button>
            <div>
                <button onclick="filterProducts('Yellow')" class="filterButton">YELLOW CARS</button>
            </div>
            <div>
                <button onclick="filterProducts('Black')" class="filterButton">BLACK CARS</button>
            </div>
            <div>
                <button onclick="filterProducts('Green')" class="filterButton">GREEN CARS</button>
            </div>
            <button onclick="filterProducts('Orange')" class="filterButton">ORANGE CARS</button>
        </div>

        <div class="filter-container2">
            <p class="filterTitle">FILTER BY BRAND</p>
            <div>
                <button onclick="filterProductsBrand('all')"  class="filterButton">ALL BRANDS</button>
            </div>
                <button onclick="filterProductsBrand('Fiat')"  class="filterButton">FIAT</button>
            <div>
                <button onclick="filterProductsBrand('Triumph')"  class="filterButton">TRIUMPH</button>
            </div>
            <div>
                <button onclick="filterProductsBrand('Alvis')"  class="filterButton">ALVIS</button>
            </div>
            <div>
                <button onclick="filterProductsBrand('Jaguar')" class="filterButton" >JAGUAR</button>
            </div>
            <div>
                <button onclick="filterProductsBrand('Aston Martin')"  class="filterButton">ASTON MARTIN CARS</button>
            </div>
            <div>
                <button onclick="filterProductsBrand('De Tomaso')" class="filterButton">DE TOMASO</button>
            </div>
        </div>
    </div>
    
    
</div>

    <div class="outerContainer">
        @foreach ($products as $product) 
        <div class="productContainer" data-price="{{ $product->price}}" data-colour="{{ $product->colour }}" data-brand="{{ $product->brand }}">
            <img src="{{ $product->image}}" alt="productImage" title="productImage" class="productImage">  
                <div class="productInfo">
                    <h3>{{ $product->name }}</h3>
                    <p>£{{ number_format ($product->price, 2) }}</p>
                </div>
                <a href="/products-singleProduct/{{$product->id}}" class="button">MORE DETAILS</a>
        </div>
    @endforeach
    </div>

</div>
<script>
      
      function filterProducts(colourRange) {
        const product = document.querySelectorAll('.productContainer');

        product.forEach(product => {
            const colour = product.getAttribute('data-colour');
            const price = parseFloat(product.getAttribute('data-price'));

            switch (colourRange) {
                case 'all':
                    product.style.display = 'block';
                    break;
                case 'Red':
                    product.style.display = colour === 'Red' ? 'block': 'none';
                    break;
                case 'White':
                    product.style.display = colour === 'White' ? 'block': 'none';
                    break;  
                case 'Blue':
                    product.style.display = colour === 'Blue' ? 'block': 'none';
                    break;
                case 'Yellow':
                    product.style.display = colour === 'Yellow' ? 'block': 'none';
                    break; 
                case 'Black':
                    product.style.display = colour === 'Black' ? 'block': 'none';
                    break;   
                case 'Green':
                    product.style.display = colour === 'Green' ? 'block': 'none';
                    break; 
                case 'Orange':
                    product.style.display = colour === 'Orange' ? 'block': 'none';
                    break; 
                default:
                    break;
            }
      });
    }

      function filterProductsCheckboxes() {
            const checkboxes = document.querySelectorAll('.filters input[type="checkbox"]');
            const products = document.querySelectorAll('.productContainer');
            products.forEach(product => {
                const price = parseFloat(product.getAttribute('data-price'));
                let isVisible = false;
                checkboxes.forEach(checkbox => {
                    const range = checkbox.getAttribute('data-range');
                    const checked = checkbox.checked;
                    switch (range) {
                        case 'all':
                            isVisible = checked;
                            break;
                        case 'under10000':
                            isVisible = isVisible || (checked && price < 10000);
                            break;
                        case 'under30000':
                            isVisible = isVisible || (checked && price < 30000);
                            break;
                        case 'under50000':
                            isVisible = isVisible || (checked && price < 50000);
                            break;
                        case 'under100000':
                            isVisible = isVisible || (checked && price < 100000);
                            break;
                        case 'over100000':
                            isVisible = isVisible || (checked && price > 100000);
                            break;
                        default:
                            break;
                    }
                });
                product.style.display = isVisible ? 'block' : 'none';
            });
        }

        function filterProductsBrand(brandRange) {
        const product = document.querySelectorAll('.productContainer');

        product.forEach(product => {
            const brand = product.getAttribute('data-brand');

            switch (brandRange) {
                case 'all':
                    product.style.display = 'block';
                    break;
                case 'Fiat':
                    product.style.display = brand === 'Fiat' ? 'block': 'none';
                    break;
                case 'Triumph':
                    product.style.display = brand === 'Triumph' ? 'block': 'none';
                    break;  
                case 'Alvis':
                    product.style.display = brand === 'Alvis' ? 'block': 'none';
                    break;
                case 'Jaguar':
                    product.style.display = brand === 'Jaguar' ? 'block': 'none';
                    break; 
                case 'Aston Martin':
                    product.style.display = brand === 'Aston Martin' ? 'block': 'none';
                    break;   
                case 'De Tomaso':
                    product.style.display = brand === 'De Tomaso' ? 'block': 'none';
                    break;   
                default:
                    break;
            }
      });
    }




 
</script>

</body>
</html>


   


       
    


