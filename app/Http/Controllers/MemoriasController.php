<?php

namespace App\Http\Controllers;

use App\Bairro;
use App\Fotografia;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;

class MemoriasController extends Controller
{

    public function teste(){

        $fotografias = Fotografia::find(1);
        $fotografias->Pessoa();
        $fotografias->Bairro();
        $fotografias->Cidade();
        $fotografias->Logradouro();
        $fotografias->Categoria();
        return view('teste', ['fotografias' => array($fotografias)]);
        //return dd($fotografias);
        /*$pessoa = $fotografias->getPessoa();
        return dd($pessoa);*/

    }

    public function cat($cat){

        $fotografias = Fotografia::find(1);
        $fotografias->Categoria();
        return view('memorias.categoria', ['fotografias'=>array($fotografias)]);

    }

    public function index()
    {
        //return dd($fotografias);
        return view('memorias.index');
    }

    public function sobre(){

        return view('memorias.sobre');

    }

    public function fotos(){

        $fotografias = Fotografia::paginate(16);
        return view('memorias.fotos', ['fotografias'=>$fotografias]);

    }

    public function create()
    {
        return view('memorias.create');
    }

    public function bairro(){
        $fotografia = 'Centro';
        $bairro = DB::table('bairros')->select('_id_bairro')->where('nome_bairro', '=', $fotografia)->get();
        //$bairro = Bairro::all()->where('_id_bairro', '=', 1);

        $to = 2;
        foreach ($bairro as $book) {
            $to = $book->_id_bairro;
        }

        return $to;
    }

    public function store(Request $request)
    {
        $fotografia = $request->all();
        DB::table('cidades')->insert(
            ['nome_cidade' => $fotografia['cidade']]
        );
        DB::table('bairros')->insert(
            ['nome_bairro' => $fotografia['bairro']]
        );
        DB::table('ruas')->insert(
            ['nome_rua' => $fotografia['logradouro']]
        );
        DB::table('pessoas')->insert(
            ['nome_pessoa' => $fotografia['autor']]
        );
        DB::table('pessoas')->insert(
            ['nome_pessoa' => $fotografia['fonte']]
        );

        {
            $bairro = DB::table('bairros')->select('_id_bairro')->where('nome_bairro', '=', 'Centro')->get();
            $bairroValor = null;
            foreach($bairro as $b){
                $bairroValor = $b->_id_bairro;
            }
        }
        {
            $rua = DB::table('ruas')->where('nome_rua', '=', $fotografia['logradouro'])->get();
            $ruaValor = null;
            foreach($rua as $b){
                $ruaValor = $b->_id_rua;
            }
        }
        {
            $cidade = DB::table('cidades')->where('nome_cidade', '=', $fotografia['cidade'])->get();
            $cidadeValor = null;
            foreach($cidade as $b){
                $cidadeValor = $b->_id_cidade;
            }
        }

        $localbaixa = "teste";
        DB::table('fotografias')->insert(
            [
                'nome_fotografia' => $fotografia['nome'],
                'caminho_alta_resolucao' => $localbaixa,
                'caminho_baixa_resolucao' => $localbaixa,
                'producao' => $fotografia['producao'],
                'descricao' => $fotografia['descricao'],
                'conservacao' => $fotografia['conservacao'],
                'cor' => $fotografia['cor'],
                'pessoas_presente' => $fotografia['pessoas_presentes'],
                'ano' => $fotografia['ano'],
                'referencia' => $fotografia['referencia'],
                '_id_bairro' => $bairroValor,
                '_id_rua' => $ruaValor,
                '_id_cidade' => $cidadeValor,
            ]
        );

        {
            $fotografiaid = DB::table('fotografias')->where('nome_fotografia', '=', $fotografia['nome'])->get();
            $fotografiaidValor = null;
            foreach($fotografiaid as $b){
                $fotografiaidValor = $b->_id_fotografia;
            }
        }
        {
            $categoria = DB::table('categorias')->where('_id_categoria', '=', $fotografia['categoria'])->get();
            $categoriaValor = null;
            foreach($categoria as $b){
                $categoriaValor = $b->_id_categoria;
            }
        }

        DB::table('fotografia_has_categoria')->insert(
            [
                '_id_fotografia' => $fotografiaidValor,
                '_id_categoria' => $categoriaValor
            ]
        );

        {
            $autor = DB::table('pessoas')->where('nome_pessoa', '=', $fotografia['autor'])->get();
            $autorValor = null;
            foreach($autor as $b){
                $autorValor = $b->_id_pessoa;
            }
        }

        DB::table('fotografia_has_pessoas')->insert(
            [
                '_id_fotografia' =>  $fotografiaidValor,
                '_id_pessoa' => $autorValor,
                'tipo_pessoa' => 'Autor'
            ]
        );

        {
            $fonte = DB::table('pessoas')->where('nome_pessoa', '=', $fotografia['fonte'])->get();
            $fonteValor = null;
            foreach($fonte as $b){
                $fonteValor = $b->_id_pessoa;
            }
        }

        DB::table('fotografia_has_pessoas')->insert(
            [
                '_id_fotografia' =>  $fotografiaidValor,
                '_id_pessoa' => $fonteValor,
                'tipo_pessoa' => 'Fonte'
            ]
        );


        {
            $pesquisador = DB::table('pessoas')->where('nome_pessoa', '=', $fotografia['fonte'])->get();
            $pesquisadorValor = null;
            foreach($pesquisador as $b){
                $pesquisadorValor = $b->_id_pessoa;
            }
        }

        DB::table('fotografia_has_pessoas')->insert(
            [
                '_id_fotografia' =>  $fotografiaidValor,
                '_id_pessoa' => $pesquisadorValor,
                'tipo_pessoa' => 'Pesquisador'
            ]
        );

        return redirect()->route('memorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $fotografias = Fotografia::find($id);
        $fotografias->Pessoa();
        $fotografias->Bairro();
        $fotografias->Cidade();
        $fotografias->Logradouro();
        $fotografias->Categoria();
        return view('memorias.show', ['fotografias'=>array($fotografias)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $fotografias = DB::table('fotografias')
            ->join('ruas', 'ruas._id_rua', '=', 'fotografias._id_rua')
            ->join('bairros', 'bairros._id_bairro', '=', 'fotografias._id_bairro')
            ->join('cidades', 'cidades._id_cidade', '=', 'fotografias._id_cidade')
            ->where('_id_fotografia', '=', $id)
            ->get();
        return view('memorias.edit', ['fotografias'=>$fotografias]);
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
        $fotografia = $request->all();
        DB::table('cidades')->insert(
            ['nome_cidade' => $fotografia['cidade']]
        );
        DB::table('bairros')->insert(
            ['nome_bairro' => $fotografia['bairro']]
        );
        DB::table('ruas')->insert(
            ['nome_rua' => $fotografia['logradouro']]
        );
        DB::table('pessoas')->insert(
            ['nome_pessoa' => $fotografia['autor']]
        );
        DB::table('pessoas')->insert(
            ['nome_pessoa' => $fotografia['fonte']]
        );

        {
            $bairro = DB::table('bairros')->select('_id_bairro')->where('nome_bairro', '=', 'Centro')->get();
            $bairroValor = null;
            foreach($bairro as $b){
                $bairroValor = $b->_id_bairro;
            }
        }
        {
            $rua = DB::table('ruas')->where('nome_rua', '=', $fotografia['logradouro'])->get();
            $ruaValor = null;
            foreach($rua as $b){
                $ruaValor = $b->_id_rua;
            }
        }
        {
            $cidade = DB::table('cidades')->where('nome_cidade', '=', $fotografia['cidade'])->get();
            $cidadeValor = null;
            foreach($cidade as $b){
                $cidadeValor = $b->_id_cidade;
            }
        }

        $localbaixa = "teste";
        DB::table('fotografias')->insert(
            [
                'nome_fotografia' => $fotografia['nome'],
                'caminho_alta_resolucao' => $localbaixa,
                'caminho_baixa_resolucao' => $localbaixa,
                'producao' => $fotografia['producao'],
                'descricao' => $fotografia['descricao'],
                'conservacao' => $fotografia['conservacao'],
                'cor' => $fotografia['cor'],
                'pessoas_presente' => $fotografia['pessoas_presentes'],
                'ano' => $fotografia['ano'],
                'referencia' => $fotografia['referencia'],
                '_id_bairro' => $bairroValor,
                '_id_rua' => $ruaValor,
                '_id_cidade' => $cidadeValor,
            ]
        );

        {
            $fotografiaid = DB::table('fotografias')->where('nome_fotografia', '=', $fotografia['nome'])->get();
            $fotografiaidValor = null;
            foreach($fotografiaid as $b){
                $fotografiaidValor = $b->_id_fotografia;
            }
        }
        {
            $categoria = DB::table('categorias')->where('_id_categoria', '=', $fotografia['categoria'])->get();
            $categoriaValor = null;
            foreach($categoria as $b){
                $categoriaValor = $b->_id_categoria;
            }
        }

        DB::table('fotografia_has_categoria')->insert(
            [
                '_id_fotografia' => $fotografiaidValor,
                '_id_categoria' => $categoriaValor
            ]
        );

        {
            $autor = DB::table('pessoas')->where('nome_pessoa', '=', $fotografia['autor'])->get();
            $autorValor = null;
            foreach($autor as $b){
                $autorValor = $b->_id_pessoa;
            }
        }

        DB::table('fotografia_has_pessoas')->insert(
            [
                '_id_fotografia' =>  $fotografiaidValor,
                '_id_pessoa' => $autorValor,
                'tipo_pessoa' => 'Autor'
            ]
        );

        {
            $fonte = DB::table('pessoas')->where('nome_pessoa', '=', $fotografia['fonte'])->get();
            $fonteValor = null;
            foreach($fonte as $b){
                $fonteValor = $b->_id_pessoa;
            }
        }

        DB::table('fotografia_has_pessoas')->insert(
            [
                '_id_fotografia' =>  $fotografiaidValor,
                '_id_pessoa' => $fonteValor,
                'tipo_pessoa' => 'Fonte'
            ]
        );


        {
            $pesquisador = DB::table('pessoas')->where('nome_pessoa', '=', $fotografia['fonte'])->get();
            $pesquisadorValor = null;
            foreach($pesquisador as $b){
                $pesquisadorValor = $b->_id_pessoa;
            }
        }

        DB::table('fotografia_has_pessoas')->insert(
            [
                '_id_fotografia' =>  $fotografiaidValor,
                '_id_pessoa' => $pesquisadorValor,
                'tipo_pessoa' => 'Pesquisador'
            ]
        );

        return redirect()->route('memorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::table('fotografias')->where('_id_fotografia', '=', $id)->delete();
        return redirect()->route('memorias.index');
    }
}
