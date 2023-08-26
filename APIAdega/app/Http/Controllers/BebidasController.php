<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebidas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class BebidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dadosBebidas = Bebidas::all();
        $contador = $dadosBebidas->count();

        return 'Bebidas: '.Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dadosBebidas = $request->all();

        $valida = Validator::make($dadosBebidas, [
            'nomeBebida'=>'required',
            'marcaBebida'=>'required',
        ]);

        if($valida->fails()){
            return 'Dados inválidos'.$valida->errors(true). 500;
        }

        $bebidasBanco = Bebidas::create($valida);

        if($bebidasBanco){
            return 'Bebidas Cadastradas'. Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Bebidas não cadastradas'. Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
