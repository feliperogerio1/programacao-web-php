<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //GET
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //GET
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //POST Salvar os dados na tabela Clientes
        try{
            Cliente::create([
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        ]);
        } catch(Throwable $th){
            echo $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('cliente.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // PUT
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //DELETE
    }

    public function delete(string $id)
    {
        //GET Mostrar o formulário com os dados antes de excluir
    }
}
