<?php

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/products', function() { 
  //  $allProducts = Products::all();
  //  $firstProduct = $allProducts[0];
   // return response($firstProduct->name);
//});



//Route::get('/products/{id}', function (int $id) {
    //$productId = Products::find($id); 
    //return response($productId->name);
//});

//Route::get('/products', function(Request $request) {
 //   $instock = ($request->instock);
 //   if ($instock == 0) {
  //      $allProducts = Products::where('stock', 0)->get();
  //      $firstProduct = $allProducts[0];
  //  } else {
 //       $allProducts = Products::where('stock', '>', 1)->get();
 //       $firstProduct = $allProducts[0];
 //   }
  //  return response($firstProduct->name);
    
//});


//Route::get('/products', function(Request $request) {
//    $instock = ($request->instock);
//    if ($instock == 0) {
//        $allProducts = Products::where('stock', 0)->get();
        
//    } else {
//        $allProducts = Products::where('stock', '>', 1)->get();
     
//   }
//   return response($allProducts);
    
//});

//Route::get('/products-page', function() {
//    return view('products', [
//        'title'=> 'All products!',
//    ]);
//});


Route::get('/products', function() {
    $allProducts = Products::all();

    return view('products', [
        'title'=> 'All products!',
        'products'=> $allProducts
    ]);
});


Route::get('/products-singleProduct/{id}', function(int $id, request $request) {
    $product = Products::find($id);
    if(is_null($product)) {
        return response('This productID is not in the database!');
    }

    return view('singleProduct', [
        'product'=> $product   
    ]);
});



