<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{


    /*

	https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller


    Dicas sobre resouces
    index - listar todos os itens
    create - exibe formulario para criacao
    store - armazena conteudo do formulário para criacao
    show - exibe um item
    edit - formulario de edicao de um item
    update - salva e edicao de um item
    destroy - exclui um item
    */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('nome', 'ASC')->get();
        //$produtos = Produto::orderBy('nome', 'ASC')->paginate(10);
        return view('produto.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nome','id');
        return view('produto.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O campo nome precisa ser maior do que :min !',
            'descricao.required' => 'O campo descrição é obrigatório!',
            'categoria_id.required' => 'O campo categoria é obrigatório!',
        ];

        $validatedData = $request->validate([
            'nome' => 'required|min:8',
            'descricao' => 'required',
            'categoria_id' => 'required',
        ], $message);

        $produto = new Produto;
        $produto->nome      = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();

        return redirect()->route('produto.index')->with('message', 'Produto criado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::pluck('nome','id');
        return view('produto.edit', ['produto' => $produto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $message = [
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O campo nome precisa ser maior do que :min !',
            'descricao.required' => 'O campo descrição é obrigatório!',
            'categoria_id.required' => 'O campo categoria é obrigatório!',
        ];

        $validatedData = $request->validate([
            'nome' => 'required|min:8',
            'descricao' => 'required',
            'categoria_id' => 'required',
        ], $message);

        $produto = Produto::findOrFail($id);
        $produto->nome      = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();

        return redirect()->route('produto.index')->with('message', 'Produto atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produto.index')->with('message', 'Produto excluido com sucesso!');

    }
}
