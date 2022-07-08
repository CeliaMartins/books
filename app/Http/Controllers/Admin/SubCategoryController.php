<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

  //cria subcategoria
  public function create()
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $categories = Category::orderBy('id', 'ASC')->get();
    return view('admin.subcategory_create', compact('admin', 'categories'));
  }

  //envia dados da nova subcategoria
  public function create_submit(Request $request)
  {
    $request->validate([
      'category_name' => 'required'
    ]);

    $subcategory = new SubCategory();
    $subcategory->category_name = $request->category_name;
    $subcategory->category_id = $request->category_id;

    $subcategory->save();

    return redirect()->route('admin_subcategory_show')->with('success', 'Subcategoria criada com sucesso!');
  }

  //mostra as subcategorias existentes
  public function show()
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $all_sub_categories = SubCategory::with('rCategory')->orderBy('category_id', 'ASC')->get();
                                                        
    return view('admin.subcategory_show', compact('admin', 'all_sub_categories'));
  }

  //edita a subcategoria selecionada
  public function edit($id)
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $subcategory = SubCategory::where('id', $id)->first();
    $categories = Category::orderBy('id', 'ASC')->get();
    return view('admin.subcategory_edit', compact('admin', 'subcategory', 'categories'));
  }

  //envia as alterações efetuadas na subcategoria selecionada
  public function edit_submit(Request $request, $id)
  {
    $request->validate([
      'category_name' => 'required'
    ]);

    $subcategory = SubCategory::where('id', $id)->first();
    $subcategory->category_name = $request->category_name;
    $subcategory->category_id = $request->category_id;

    $subcategory->save();

    return redirect()->route('admin_subcategory_show')->with('success', 'Subcategoria editada com sucesso!');
  }

  //apaga a subcategoria selecionada
  public function delete($id)
  {
    $category = SubCategory::where('id', $id)->first();
    $category->delete();

    return redirect()->route('admin_subcategory_show')->with('success', 'Subcategoria apagada!');
  }
}