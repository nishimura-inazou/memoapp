<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;

class MemoController extends Controller
{
    public function index(){

        $memos = Memo::where('is_dusted','==',false)->get();
        $dusted_memos = Memo::where('is_dusted','!=',false)->get();

        return view('memo/index',compact('memos','dusted_memos'));
    }

    public function edit($id){
        $memo = Memo::findOrFail($id);
        return view('memo/edit',compact('memo'));
    }

    public function show($id){

    }

    public function update(Request $request,$id){
        $memo = Memo::findOrFail($id);

        $memo->title = $request->title;
        $memo->contents = $request->contents;

        $memo->save();
        return redirect('/memo');
    }

    public function create(){
        $memo = new Memo();
        return view('/memo/create',compact('memo'));
    }

    public function store(Request $request){
        $memo = new Memo();

        $memo->title = $request->title;
        $memo->contents = $request->contents;
        $memo->save();
        return redirect('/memo');
    }

    public function destroy($id){
        $memo = Memo::findOrFail($id);
        $memo->is_dusted = true;
        $memo->save();

        return redirect('/memo');
    }

}
