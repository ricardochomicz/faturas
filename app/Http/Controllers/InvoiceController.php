<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('welcome', compact('invoices'));
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
        $file = new \SplFileObject($request->document);
        //retorna indice 0 array
        $file->seek(0);
        //retorna valor indice 0
        $empresa = $file->current();
        $file->seek(7);
        $valor = $file->current();

        $fileIterator = new \LimitIterator($file, 21);
        $etapas = [];
        foreach ($fileIterator as $line) {
            $linha = explode(';', $line);
            if ($linha[0] != "") {
                $etapas[$linha[0]][] = $linha;
                if($linha[13] == "Mensalidades e Pacotes Promocionais"){
                    //print_r(array_unique($linha));
                }
               
                
            }

            $data = Invoice::create([
                'empresa' => $empresa,
                'valor' => preg_replace('/\D/', '', $valor),
                'linhas' => $linha[0]
            ]);

            
        }

        print_r($etapas);



        //return view('upload', compact('data'));


    }

    public function export()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
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
