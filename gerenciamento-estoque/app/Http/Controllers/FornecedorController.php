<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return Fornecedor::all();
    }

    public function store(Request $request) {
        return Fornecedor::create($request->validate([
            'nome' => 'required|string',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string'
        ]));
    }

    public function show(string $id) {
        return Fornecedor::findOrFail($id);
    }

    public function update(Request $request, string $id) {
        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->update($request->validate([
            'nome' => 'required|string',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string'
        ]));

        return $fornecedor;
    }

    public function destroy(string $id) {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return response()->json(['message' => 'Fornecedor deletado com sucesso.']);
    }
}
