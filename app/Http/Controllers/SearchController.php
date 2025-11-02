<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SearchController extends Controller
{
    public function index($id)
    {
    $product_searched = Product::with('products')->findOrFail($id);

    $viewData = [];
    $viewData["products"] = $product_searched->products;

    return view('search.index')->with("viewData", $viewData);
    }
}
