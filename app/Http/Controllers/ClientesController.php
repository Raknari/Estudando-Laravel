<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clientes;
    
    class ClientesController extends Controller{
        public function index(){
            $data['clientes'] = Clientes::all();
            return view('clientes', $data);

        }

        public function getCliente($link){
            $info = Clientes::find($link);
            $data['Nome'] = $info['Nome'];
            $data['Email'] = $info['Email'];
            return view('cliente_single', $data);
        }

        public function inserir(Request $req){
            if($req->has('nome')){
                //Existe um post, apenas inserir!
                $nome = $req->input('nome');
                $email = $req->input('email');
                $clientes = new Clientes();
                $clientes->Nome = $nome;
                $clientes->Email = $email;
                $clientes->save();
                echo '<script>alert("Inserido com sucesso!")</script>';
                return redirect('/');
            }else{
                echo 'oi';
            }
        }



    }






?>