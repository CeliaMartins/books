<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
  public function login()
  {
    //dd(Hash::make('1234'));
    return view('admin.login');
  }

  //envio das credenciais do admin - início de sessão
  public function login_submit(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $credentials = [
      'email' => $request->email,
      'password' => $request->password
    ];

    if (Auth::guard('admin')->attempt($credentials)) {   //credenciais certas, inicia sessão
      return redirect()->route('admin_home');
    }

    return redirect()->route('admin_login')->with('error', 'Credenciais Inválidas');  //credenciais incorretas, nova tentativa
  }

  //fechar sessão
  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect()->route('admin_login');
  }

  public function forgot()
  {
    return view('admin.forgot');
  }

  //pedido de nova password
  public function forgot_submit(Request $request)
  {
    $request->validate([
      'email' => 'required|email'
    ]);

    $admin_data = Admin::where('email', $request->email)->first();

    if ($admin_data) {

      $token = hash('sha256', time());

      $admin_data->token = $token;
      $admin_data->update();

      $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
      
      $subject = 'Redefinição da password';
      $message = 'Utilize o link seguinte para redefinir a sua password <br />';
      $message .= '<a href="' . $reset_link . '">Clicar Aqui!</a>';

      Mail::to($request->email)->send(new WebsiteMail($subject, $message));  //envio de mail com link para alterar password

      return redirect()->route('admin_login')->with('success', 'O email de redefinição da palavra-passe foi enviado com sucesso');
    }

    return redirect()->back()->with('error', 'Utilizador não existe na aplicação');  //se o email estiver errado, recebe esta mensagem
  }

  public function reset($token, $email)
  {
    $admin_data = Admin::where('token', $token)->where('email', $email)->first();

    if (!$admin_data) {
      return redirect()->route('admin_login')->with('error', 'Token expirado');
    }

    return view('admin.reset_password', compact('email', 'token'));
  }

  //envio de pedido de alteração de password
  public function reset_submit(Request $request)
  {
    $request->validate([
      'password' => 'required',
      'retype_password' => 'required|same:password'
    ]);

    $admin_data = Admin::where('token', $request->token)->where('email', $request->email)->first();

    $admin_data->password = Hash::make($request->password);
    $admin_data->token = '';
    $admin_data->update();

    return redirect()->route('admin_login')->with('success', 'Palavra passe alterada com sucesso');
  }

}