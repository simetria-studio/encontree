<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Excel::import(new Empresa, $request->file('file')->store('temp'));
        return back();
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

    private $rows = [];

    public function import(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        $records = array_map('str_getcsv', file($path));

        if (!count($records) > 0) {
            return 'Error...';
        }

        // Get field names from header column
        $fields = array_map('strtolower', $records[0]);

        // Remove the header column
        array_shift($records);

        foreach ($records as $record) {
            if (count($fields) != count($record)) {
                return 'csv_upload_invalid_data';
            }

            // Decode unwanted html entities
            $record =  array_map("html_entity_decode", $record);

            // Set the field name as key
            $record = array_combine($fields, $record);

            // Get the clean data
            $this->rows[] = $this->clear_encoding_str($record);
        }

        foreach ($this->rows as $row) {
            \Log::info($row);
            Empresa::create([
                'cnpj' => $row['cnpj'],
                'razao' => $row['razao'],
                'fantasia' => $row['fantasia'],
                'tipo' => $row['tipo'],
                'endereco' => $row['endereco'],
                'numero' => $row['numero'],
                'complemento' => $row['complemento'],
                'bairro' => $row['bairro'],
                'cidade' => $row['cidade'],
                'uf' => $row['uf'],
                'cep' => $row['cep'],
                'pais_origem' => $row['pais origem'],
                'telefone_1' => $row['telefone 1'],
                'telefone_2' => $row['telefone 2'],
                'email' => $row['e-mail'],
                'cnae_principal' => $row['cnae principal'],
                'cnae_secundario' => $row['cnae secundario'],
                'matriz_filial' => $row['matriz/filial'],
                'situacao' => $row['situacao cad'],
                'data_situacao' => $row['data situacao cad'],
                'natureza_juridica' => $row['natureza juridica'],
                'data_inicio_atv' => $row['data inicio atv'],
                'opcao_mei' => $row['opcao pelo mei'],
                'porte_empresa' => $row['porte empresa'],
                'regime_tributario' => $row['regime tributario'],
                'data_opcao_simples' => $row['data opcao simples'],
                'data_exclusao' => $row['data exclusao simples'],
                'capital_social' => $row['capital social da empresa'],
                'id_socio' => $row['identificador_socio'],
                'nome_socio' => $row['nome do socio'],
                'cpf_socio' => $row['cpf do socio'],
                'qualificacao' => $row['qualificacao'],
                'data_entrada' => $row['data da entrada'],
                'faturamento_estimado' => $row['faturamento estimado'],
                'qd_funcionarios' => $row['quadro de funcionarios'],
                'dividas_federais' => $row['dividas federais ativas'],
                'ativas' => 'b',
            ]);
        }

        return redirect()->back();
    }

    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
}
