<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewController extends Controller
{


  //mostra o detalhe da publicação selecionada
  //identifica o admin que publicou
    public function view_single($id)
    {
      $post = Book::with('rSubCategory')->where('id', $id)->first();
      $user_data = Admin::where('id', $post->admin_id)->first();
  
      return view('book_details', compact('post', 'user_data'));
    }

    //vai buscar todos os livros e coloca 3 por página
    public function view_list()
    {
      $all_posts = DB::table('Books')->paginate(3);
              
      return view('book_list', compact('all_posts'));
    }


    //pesquisa por titulo
    //pesquisa por autor
    public function search(Request $request)
    {
      //dd("pesquisando por {$request->search}");
      $filters = $request->all();
      $all_posts = Book::where('post_title', 'LIKE', "%{$request->search}%")  
                        ->orwhere('author', 'LIKE', "%{$request->search}%") 
                        ->paginate();

      return view('search_result', compact('filters', 'all_posts'));
    }
   
}