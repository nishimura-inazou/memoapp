<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Memo;

class MemoController extends Controller
{

    protected $service;

    public function __constract(CommonService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){

        $postData = $request->all();
        if(empty($postData)){
            $searchTitle = '';
            $searchContents = '';
        }else{
            $searchTitle = $postData['searchTitle'];
            $searchContents = $postData['searchContents'];
        }

        /* Modelを使ったCRUD操作
        $memos = Memo::where('is_dusted','==',false)
                ->get();
        */

        //Modelを使わないCRUD操作
        $memos = [];
        $sqlData = \DB::table('memos as a');
        $sqlData->select('a.id'
                       , 'a.title'
                       , 'a.contents'
        );
        $sqlData->where('is_dusted','==','false');
        $sqlData->where('title','LIKE',"%$searchTitle%");
        $sqlData->where('title','LIKE',"%$searchContents%");
        $memos = $sqlData->get();

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

        /*
        $postData = $request->all();
        $searchString = $request->searchString;

        $memos = Memo::where('title','LIKE',"%$searchString\n%")->get();
        $dusted_memos = Memo::where('is_dusted','!=',false)->get();
        return view('memo/index',compact('memos','dusted_memos'));
        */
    }

    public function destroy($id){
        $memo = Memo::findOrFail($id);
        $memo->is_dusted = true;
        $memo->save();

        return redirect('/memo');
    }


    public function test(Request $request){
        $postData = $request->all();


        return view('test')->with($data);
    }

}
