<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index() {
        return Movimentacao::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo' => 'required|in:entrada,saida',
            'quantidade' => 'required|integer|min:1',
            'data' => 'required|date'
        ]);

        $produto = Produto::find($data['produto_id']);

        if ($data['tipo'] === 'entrada') {
            $produto->estoque += $data['quantidade'];
        } else {
            $produto->estoque -= $data['quantidade'];
        }

        $produto->save();

        return Movimentacao::create($data);
    }

    public function show(string $id) {
        return Movimentacao::findOrFail($id);
    }

    public function update(Request $request, string $id) {
        $movimentacao = Movimentacao::findOrFail($id);

        $movimentacao->update($request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'tipo' => 'required|in:entrada,saida',
            'data' => 'required|date'
        ]));

        return $movimentacao;
    }

    public function destroy(string $id) {
        $movimentacao = Movimentacao::findOrFail($id);
        $movimentacao->delete();

        return response()->json(['message' => 'Movimentação deletada com sucesso.']);
    }
}
