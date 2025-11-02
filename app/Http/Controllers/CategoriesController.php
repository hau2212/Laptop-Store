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

class CategoriesController extends Controller
{
    public function index($id)
    {
    // Lấy category và tất cả sản phẩm liên kết
    $category = Category::with('products')->findOrFail($id);

    $viewData = [];
    $viewData["title"] = "Danh mục: " . $category->name;
    $viewData["products"] = $category->products;

    return view('categories.index')->with("viewData", $viewData);
    }
}
