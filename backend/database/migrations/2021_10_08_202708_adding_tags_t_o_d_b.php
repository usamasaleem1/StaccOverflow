<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddingTagsTODB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tags = ["JavaScript", "C++", "C", "PHP", "Ruby", "Python", "Java", "C#", "TypeScript", "HTML", "CSS"];

        foreach ($tags as $tag) {
            DB::table("tags")->insert([
                "name"       => $tag,
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
