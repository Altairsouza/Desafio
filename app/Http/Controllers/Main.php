<?php

namespace App\Http\Controllers;

use App\Classes\Enc;
use App\Classes\Logger;
use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class Main extends Controller
{

    private $Enc;
    private $Logger;

    public function __construct()
    {
        $this->Enc = new Enc();
        $this->Logger = new Logger();
    }

    // =========================================================
    public function index()
    {


        if ($this->checkSession()) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    // =========================================================
    private function checkSession()
    {
        return  session()->has('usuario');
    }

    //==============================================
    public function login()
    {

        if ($this->checkSession()) {
            return redirect()->route('index');
        }

        $erro = session('erro');

        $data = [];
        if (!empty($erro)) {
            $data = [
                'erro' => $erro
            ];
        }



        return view('login', $data);
    }

    //==============================================
    public function login_submit(LoginRequest $request)
    {

        if (!$request->isMethod('post')) {
            return redirect()->route('index');
        }

        if ($this->checkSession()) {
            return redirect()->route('index');
        }


        $request->validated();


        $usuario = trim($request->input('text_usuario'));
        $senha = trim($request->input('text_senha'));

        $usuario =  Usuario::where('usuario', $usuario)->first();


        if (!$usuario) {

            $this->Logger->log('error',trim($request->input('text_usuario')). ' - Não existe o usuário indicado.');


            session()->flash('erro', ['Não existe o usuário', ]);
            return redirect()->route('login');
        }



        if (!Hash::check($senha, $usuario->senha)) {



            $this->Logger->log('error',trim($request->input('text_usuario')). ' - Senha inválida.');

            session()->flash('erro', ['Senha inválida.']);
            return redirect()->route('login');
        }

        session()->put('usuario', $usuario);




       //logger
       $this->Logger->log('info', 'fez o seu login');

        return redirect()->route('login');
    }


    //===============================================================
    public function logout()
    {

        //logger
        $this->Logger->log('info','Fez o seu logout.');

        session()->forget('usuario');
        return redirect()->route('index');
    }


    //===============================================================
    public function home()
    {



        if (!$this->checkSession()) {
            return redirect()->route('login');
        }

        $data = [
            'usuarios' => Usuario::all()
        ];



        return view('home', $data);
    }

}




