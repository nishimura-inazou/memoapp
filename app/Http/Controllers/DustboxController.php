<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;

class DustboxController extends Controller
{
    public function index(){
        $dusted_memos = Memo::where('is_dusted','!=',false)->get();

        return view('dustbox/index',compact('dusted_memos'));
    }

    public function update($id){
        $memo = Memo::findOrFail($id);
        $memo->is_dusted = false;
        $memo->save();

        return redirect('/dustbox');
    }

    public function destroy($id){
        $memo = Memo::findOrFail($id);
        $memo->delete();

        return redirect('/dustbox');
    }


    public function all_del(){
        Memo::where('is_dusted','!=',false)->delete();
        return redirect('/dustbox');
    }

}
