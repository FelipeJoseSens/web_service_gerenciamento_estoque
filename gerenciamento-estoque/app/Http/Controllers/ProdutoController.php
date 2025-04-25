<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        return Produto::with(['fornecedor', 'categoria'])->get();
    }

    public function store(Request $request) {
        return Produto::create($request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'fornecedor_id' => 'required|exists:suppliers,id',
            'categoria_id' => 'required|exists:categories,id'
        ]));
    }

    public function show(string $id)
    {
        return Produto::with(['fornecedor', 'categoria'])->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update($request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'fornecedor_id' => 'required|exists:suppliers,id',
            'categoria_id' => 'required|exists:categories,id'
        ]));

        return $produto;
    }

    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return response()->json(['message' => 'Produto deletado com sucesso.']);
    }
}
