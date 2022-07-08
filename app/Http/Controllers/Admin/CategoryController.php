<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

  //cria a categoria
  public function create()
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    return view('admin.category_create', compact('admin'));
  }


  //envia os dados da nova categoria 
  public function create_submit(Request $request)
  {
    $request->validate([
      'category_name' => 'required'
    ]);

    $category = new Category();
    $category->category_name = $request->category_name;
    $category->save();

    return redirect()->route('admin_category_show')->with('success', 'Categoria adicionada com sucesso!');
  }

  //lista as categorias
  public function show()
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $all_categories = Category::orderBy('category_name', 'ASC')->get();
    return view('admin.category_show', compact('admin', 'all_categories'));
  }

  //edita a categoria selecionada
  public function edit($id)
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $category = Category::where('id', $id)->first();
    return view('admin.category_edit', compact('admin', 'category'));
  }

  //submete as alterações efetuadas à categoria
  public function edit_submit(Request $request, $id)
  {
    $request->validate([
      'category_name' => 'required'
    ]);

    $category = Category::where('id', $id)->first();
    $category->category_name = $request->category_name;
    $category->save();

    return redirect()->route('admin_category_show')->with('success', 'Categoria editada com sucesso!');
  }

  //apaga a categoria selecionada
  public function delete($id)
  {
    $category = Category::where('id', $id)->first();
    $category->delete();

    return redirect()->route('admin_category_show')->with('success', 'Categoria apagada!');
  }

}