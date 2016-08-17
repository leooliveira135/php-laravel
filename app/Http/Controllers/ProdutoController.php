<?php namespace estoque\Http\Controllers;
    
use Illuminate\Support\Facades\DB;
use estoque\Produto;

class ProdutoController extends Controller{
    public function lista(){
        $produtos = DB::select('select * from produtos');
        $data = ['produtos' => $produtos];
        return view('listagem', $data);
    }
}