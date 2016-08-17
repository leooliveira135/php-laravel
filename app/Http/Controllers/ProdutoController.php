<?php namespace estoque\Http\Controllers;
    
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;

class ProdutoController extends Controller{
    public function lista(){
        $produtos = DB::select('select * from produtos');
        $data = ['produtos' => $produtos];
        return view('listagem', $data);
    }
    
    public function mostra($id){
        $resposta = DB::select('select * from produtos where id = ?', [$id]);
        if(empty($resposta)){
            return "Este produto não existe";
        }
        return view('detalhes')->with('p',$resposta[0]);
    }
}