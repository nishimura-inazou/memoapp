<?php

use Illuminate\Database\Seeder;

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memos')->truncate();

        $memos = [
            ['title' => '初めのメモ',
            'contents' => 'メモを活用しましょう']
        ];

        foreach($memos as $memo){
            \App\Memo::create($memo);
        }
    }
}
