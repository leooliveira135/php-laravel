<?php namespace estoque\Http\Controllers;

use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller{
    
    public function __construct(){
        $this->middleware('nosso-middleware', [
            'only' => ['adiciona' ,'altera', 'atualiza', 'remove']
        ]);
    }
    
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
    
    public function adiciona(ProdutosRequest $request){
        Produto::create($request->all());
        
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }
    
    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        
        return redirect()->action('ProdutoController@lista');
    }
    
    public function altera($id){
        $produto = Produto::findOrFail($id);
        
        if(is_null($produto)){
            return Redirect::route('produto.adicionado');
        }
        
        return view('produto.listagem')->with('produtos',$produto);
    }
    
    public function atualiza($id, ProdutosRequest $request){
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }
}