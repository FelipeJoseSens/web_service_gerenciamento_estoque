<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        return Categoria::all();
    }

    public function store(Request $request) {
        return Categoria::create($request->validate([
            'nome' => 'required|string',
            'descricao' => 'nullable|string'
        ]));
    }

    public function show(string $id) {
        return Categoria::findOrFail($id);
    }

    public function update(Request $request, string $id) {
        $categoria = Categoria::findOrFail($id);

        $categoria->update($request->validate([
            'nome' => 'required|string',
            'descricao' => 'nullable|string'
        ]));

        return $categoria;
    }

    public function destroy(string $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(['message' => 'Categoria deletada com sucesso.']);
    }
}
