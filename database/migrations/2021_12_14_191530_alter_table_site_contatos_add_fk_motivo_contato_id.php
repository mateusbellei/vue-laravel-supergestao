<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatoId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adicionando coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id')->after('email')->nullable();
        });

        // atualizando coluna motivo_contatos_id com o valor do id do motivo_contato
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // Foreign Key SiteContatos // removendo a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato')->after('email')->nullable();
            $table->dropForeign(['motivo_contatos_id']);
        });

        // atualizando coluna motivo_contato com o valor do id do motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        // removendo coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
