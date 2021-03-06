<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateWikiPagesTable
 *
 * @author Kovács Vince<vincekovacs@hotmail.com>
 */
class CreateWikiPagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki_pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('url')
                  ->unique();
            $table->string('title');
            $table->text('toc');
            $table->text('content');
            $table->boolean('draft')
                  ->default(true);

            $table->enum('type', ['markdown'])
                  ->default('markdown');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wiki_pages');
    }
}
