<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Memo;

// PhpSpreadsheetの参照追加
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

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


    public function export(){

        // Excelインスタンス作成
        $spreadsheet = new Spreadsheet();
        // 既存のシートを選択
        $sheet = $spreadsheet->getActiveSheet();

        // データの書き込み
        $sheet->setCellValue('A1','Hello hoge!');

        // ダウンロード
        $fileName = 'HelloHoge.xlsx';
        header('Content-Disposition: attachment; filename=' . mb_convert_encoding($fileName, 'SJIS-win', 'UTF-8'));
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');


    }

    public function test(Request $request)
    {
        return view('test');
    }

    public function download()
    {
        $pathToFile = 'test.txt';
        $fileName = 'test.txt';

        $headers = ['Content-Type' => 'text/csv'];
        return response()->download($pathToFile, $fileName, $headers);

    }
}