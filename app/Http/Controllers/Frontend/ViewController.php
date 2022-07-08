<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function view_single($id)
    {
      $post = Book::with('rSubCategory')->where('id', $id)->first();  //mostra o detalhe da publicação selecionada
      $user_data = Admin::where('id', $post->admin_id)->first();  //identifica o admin que publicou
  
      return view('book_details', compact('post', 'user_data'));
    }

    public function view_list()
    {
      $all_posts = DB::table('Books')->paginate(3);  //vai buscar todos os livros e coloca 3 por página
              
      return view('book_list', compact('all_posts'));
    }

    public function search(Request $request)
    {
      /* dd("pesquisando por {$request->search}"); */
      $filters = $request->all();
      $all_posts = Book::where('post_title', 'LIKE', "%{$request->search}%")  //pesquisa por titulo
                        ->orwhere('author', 'LIKE', "%{$request->search}%") //pesquisa por autor
                        ->paginate();

      return view('search_result', compact('filters', 'all_posts'));
    }
   
}