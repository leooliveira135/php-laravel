<?php namespace estoque\Http\Controllers;
    
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use Illuminate\Support\Facades\Input;

class ProdutoController extends Controller{
    public function lista(){
        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }
    
    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
    }
    
    public function mostra($id){
        $produto = Produto::find($id);
        if(empty($produto)){
            return "Este produto não existe";
        }
        return view('produto.detalhes')->with('p',$produto);
    }
    
    public function novo(){
        return view('produto.formulario');
    }
    
    public function adiciona(){
        Produto::create(Request::all());
        
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }
    
    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        
        return redirect()->action('ProdutoController@lista');
    }
    
    public function altera($id){
        $produto = Produto::find($id);
        $produto->nome = Input::get('nome');
        $produto->valor = Input::get('valor');
        $produto->descricao = Input::get('descricao');
        $produto->quantidade = Input::get('quantidade');
        
        $produto->save();
        
        return view('produto.formulario')->with('p', $produto);
    }
}