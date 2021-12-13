<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $dados = file($request->document);
        // $TiraLnha = array_shift($dados);

        // foreach ($dados as $linha) {
        //     $linha = trim($linha);

        //     $valor = explode(';', $linha);
        // }



        // Aqui você abre e lê o arquivo
        $arquivo = fopen($request->document, 'r');
        // Aqui você está definindo que a variável é um 'array()'
        $result = array();
        // Você agora irá verificar se existe o arquivo e se o código acim o leu (true|false)
        while (!feof($arquivo)) {
            // Aqui foi onde você errou, pois seria '$result[]' e não '$result'
            $result[] = explode(";", fgets($arquivo));
        }
        // Fechando a leitura do arquivo
        fclose($arquivo);
       
        return view('upload', compact('result'));
        //    // Postando resultados






        // $conteudo = array();
        // $f = fopen($request->document, "r");
        // while ($linha = fgetcsv($f, 0, ';')) {

        //     // retira o primeiro elemento do array, retornando-o para a variável $chave
        //     $chave = array_shift($linha);

        //     // associa a chave determinada na linha anterior o elemento restante do array
        //     $conteudo[$chave] = $linha;
        // }
        // fclose($f);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
