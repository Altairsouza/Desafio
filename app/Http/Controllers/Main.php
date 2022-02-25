<?php

namespace App\Http\Controllers;

use App\Classes\Enc;
use App\Classes\Logger;
use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use App\Models\Membro;
use App\Models\Telefone;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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

        //validacao
        $request->validated();

        //verificar dados de login
        $usuario = trim($request->input('text_usuario')); // trim serve pra remover espaços em branco do inico ao fim
        $senha = trim($request->input('text_senha'));

        $usuario =  Usuario::where('usuario', $usuario)->first();

        // VERIFICA SE EXISTE O USUARIO
        if (!$usuario) {

            $this->Logger->log('error', trim($request->input('text_usuario')) . ' - Não existe o usuário indicado.');


            session()->flash('erro', ['Não existe o usuário', 'segundo erro!!!']); // o fash é um metodo q só vai ser usada uma vez por sessao
            return redirect()->route('login');
        }


        //verificar se a senha está correnta
        if (!Hash::check($senha, $usuario->senha)) { // o value vai mostrar a senha original e o usuario->senha e a senha
            //criptografada dai eles vao ver se é a msm senha


            //Logger
            $this->Logger->log('error', trim($request->input('text_usuario')) . ' - Senha inválida.');

            session()->flash('erro', ['Senha inválida.']); // o fash é um metodo q só vai ser usada uma vez por sessao
            return redirect()->route('login');
        }
        //criar a sessao (se login ok)
        session()->put('usuario', $usuario); // esse usuario ta sendo pego do index e variavel do objeto




        //logger
        $this->Logger->log('info', 'fez o seu login');

        return redirect()->route('home');
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
            'membros' => Membro::all()
        ];



        return view('home', $data);
    }


    //====================================================
    // USUARIOS

    public function novo_usuario()
    {

        // display new task form
        return view('novo_membro');
    }

    public function novo_cadastro(Request $request){


        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $dataNascimento = $request->input('nascimento');

        $membro = new Membro();
        $membro->nome = $nome;
        $membro->cpf = $cpf;
        $membro->dataNascimento = $dataNascimento;

        $membro->save();

        return  redirect()->route('home');
    }


    public function editar_membro($id_usuario)
    {
        $membro = Membro::find($id_usuario);
        return view('editar_membro',['membro'=>$membro]);

    }

    public function edite(Request $request)
    {

        $id = $request->input('id');
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
        $dataNascimento = $request->input('nascimento');

        $membro =  Membro::find($id);
        $membro->nome = $nome;
        $membro->cpf = $cpf;
        $membro->dataNascimento = $dataNascimento;

        $membro->save();

        return  redirect()->route('home');
    }


    public function deletar($id)
    {
       $delete = Membro::find($id);
       $delete->delete();
        return  redirect()->route('home');
    }

    public function telefone()
    {
        $telefones = Membro::find(1)->telefones;

        return view('lista_telefone', ['telefones' => $telefones]);


    }

    public function delete_telefone($id)
    {
        $delete = Telefone::find($id);
        $delete->delete();
        return  redirect()->route('telefone');
    }

    }






