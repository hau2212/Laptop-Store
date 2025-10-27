<?php

namespace App\Http\Controllers\Home;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // ✅ thêm dòng này
class HomeController extends Controller
{
    //
    public function index(){
        $viewData= [];
        $viewData['title'] = "LaptopShop" ;
        $viewData['content'] = "Welcome to LaptopShop, your one-stop shop for all laptop needs. Explore our wide range of laptops, accessories, and more!";
        $viewData['footer'] = "© 2024 LaptopShop. All rights reserved.";
        $viewData['products'] = Product::all();
        return view('home.main') ->with("viewData", $viewData);
    }
    public function about(){
        $viewData= [];
        $viewData['title'] = "About Us" ;
        $viewData['footer'] = " About Us \n © 2024 LaptopShop. All rights reserved.";
        return view('home.about') ->with("viewData", $viewData);
    }
    
}
