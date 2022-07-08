<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function home()
    {
      $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();  //admin autenticado

      $all_posts = Book::orderBy('created_at', 'DESC')->get();  //mostra os livros por ordem descendente de criação
      $all_categories = Category::orderBy('category_name', 'ASC')->get();
      $all_sub_categories = SubCategory::with('rCategory')->orderBy('category_name', 'ASC')->get();
      return view('admin.home', compact('admin', 'all_posts', 'all_categories', 'all_sub_categories'));
    }

    //mostra dados admin autenticado
    public function profile($id)
    {
      $admin = Admin::where('id', $id)->first();
      return view('admin.profile', compact('admin'));

    }

}