<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

  //criar livro
  public function create()
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $sub_categories = SubCategory::with('rCategory')->orderBy('category_name', 'ASC')->get();
    return view('admin.post_create', compact('admin', 'sub_categories'));
  }

  //submete os dados do novo livro
  public function create_submit(Request $request)
  {
    $request->validate([
      'post_title' => 'required',
      'post_detail' => 'required',
      'post_photo' => 'required|image|mimes:jpg,jpeg,png,gif'
    ]);

    $now = time();
    $ext = $request->file('post_photo')->extension();
    $final_name = 'post_photo_' . $now . '.' . $ext;
    $request->file('post_photo')->move(public_path('uploads/'), $final_name);

    $post = new Book();
    $post->post_title = $request->post_title;
    $post->sub_category_id = $request->sub_category_id;
    $post->post_detail = $request->post_detail;
    $post->post_photo = $final_name;
    $post->author = $request->author;
    $post->ISBN = $request->ISBN;
    $post->qtd = $request->qtd;
    $post->admin_id = Auth::guard('admin')->user()->id;
    $post->save();

    return redirect()->route('admin_post_show')->with('success', 'Publicação criada com sucesso!');
  }

  //mostra todos os livros
  public function show()
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $all_posts = Book::with('rSubCategory')->get();
    return view('admin.post_show', compact('admin', 'all_posts'));
  }

  //edita o livro selecionado
  public function edit($id)
  {
    $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
    $sub_categories = SubCategory::with('rCategory')->orderBy('category_name', 'ASC')->get();
    $post = Book::with('rSubCategory')->where('id', $id)->first();
    return view('admin.post_edit', compact('post', 'sub_categories', 'admin'));
  }

  //envio das alterações
  public function edit_submit(Request $request, $id)
  {
    $request->validate([
      'post_title' => 'required',
      'post_detail' => 'required',
    ]);

    $post = Book::where('id', $id)->first();
    $post->post_title = $request->post_title;
    $post->sub_category_id = $request->sub_category_id;
    $post->post_detail = $request->post_detail;
    $post->author = $request->author;
    $post->ISBN = $request->ISBN;
    $post->qtd = $request->qtd;
    if ($request->hasFile('post_photo')) {
      $request->validate([
        'post_photo' => 'image|mimes:jpg,jpeg,png,gif'
      ]);

      unlink(public_path('uploads/' . $post->post_photo));

      $now = time();
      $ext = $request->file('post_photo')->extension();
      $final_name = 'post_photo_' . $now . '.' . $ext;
      $request->file('post_photo')->move(public_path('uploads/'), $final_name);

      $post->post_photo = $final_name;
    }
    $post->update();

    return redirect()->route('admin_post_show')->with('success', 'Publicação editada com sucesso!');
  }


  //apaga o livro selecionado
  public function delete($id)
  {
    $post = Book::where('id', $id)->first();
    $post->delete();

    return redirect()->route('admin_post_show')->with('success', 'Publicação apagada!');
  }

}