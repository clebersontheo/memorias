<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Fotografia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;

class ApiMemoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showcat($cat){

        $foto = DB::table('fotografias')
            ->join('ruas', 'ruas._id_rua', '=', 'fotografias._id_rua')
            ->join('bairros', 'bairros._id_bairro', '=', 'fotografias._id_bairro')
            ->join('cidades', 'cidades._id_cidade', '=', 'fotografias._id_cidade')
            ->join('fotografia_has_categoria', 'fotografia_has_categoria._id_fotografia', '=', 'fotografias._id_fotografia')
            ->join('categorias', 'categorias._id_categoria', '=', 'fotografia_has_categoria._id_categoria')
            ->join('fotografia_has_pessoas', 'fotografia_has_pessoas._id_fotografia', '=', 'fotografias._id_fotografia')
            ->join('pessoas', 'pessoas._id_pessoa', '=', 'fotografia_has_pessoas._id_pessoa')
            ->where('categorias._id_categoria', '=', $cat)
            ->get();
        return dump($foto);
    }

    public function index()
    {
        $foto = DB::table('fotografias')
                ->join('ruas', 'ruas._id_rua', '=', 'fotografias._id_rua')
                ->join('bairros', 'bairros._id_bairro', '=', 'fotografias._id_bairro')
                ->join('cidades', 'cidades._id_cidade', '=', 'fotografias._id_cidade')
                ->get();
        return dump($foto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $file = $request->input('foto');
        Image::make( $file->getRealPath() )->fit(340, 340)->save('img/resized-image.jpg')->destroy();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Respon
     */
    public function show($id)
    {
        $foto = DB::table('fotografias')
            ->join('ruas', 'ruas._id_rua', '=', 'fotografias._id_rua')
            ->where('_id_fotografia', '=', $id)
            ->get();

        return dump($foto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
