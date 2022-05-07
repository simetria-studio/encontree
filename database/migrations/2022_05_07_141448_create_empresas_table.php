<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj')->nullable();
            $table->string('razao')->nullable();
            $table->string('fantasia')->nullable();
            $table->string('tipo')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('cep')->nullable();
            $table->string('pais_origem')->nullable();
            $table->string('telefone_1')->nullable();
            $table->string('telefone_2')->nullable();
            $table->string('email')->nullable();
            $table->text('cnae_principal')->nullable();
            $table->text('cnae_secundario')->nullable();
            $table->string('matriz_filial')->nullable();
            $table->string('situacao')->nullable();
            $table->string('data_situacao')->nullable();
            $table->string('natureza_juridica')->nullable();
            $table->string('data_inicio_atv')->nullable();
            $table->string('opcao_mei')->nullable();
            $table->string('porte_empresa')->nullable();
            $table->text('regime_tributario')->nullable();
            $table->text('data_opcao_simples')->nullable();
            $table->text('data_exclusao')->nullable();
            $table->text('capital_social')->nullable();
            $table->text('id_socio')->nullable();
            $table->text('nome_socio')->nullable();
            $table->text('cpf_socio')->nullable();
            $table->text('qualificacao')->nullable();
            $table->text('data_entrada')->nullable();
            $table->text('faturamento_estimado')->nullable();
            $table->text('qd_funcionarios')->nullable();
            $table->text('dividas_federais')->nullable();
            $table->text('ativas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
