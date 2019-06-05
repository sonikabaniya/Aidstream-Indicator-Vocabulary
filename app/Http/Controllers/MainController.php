<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Indicator;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show($id)
    {
        return view('index', ["id"=>$id]);
    }

    public function sqlquery()
    {
        $indicators = DB::table('indicator')->select(DB::raw('DISTINCT vocab, count(vocab) as count,standardlink'))->groupBy('vocab','standardlink')->get();
        $row_num = 1;
        return view('welcome', ['indicators' => $indicators,'row_num' => $row_num]);
    }

    public function searchquery($query = NULL, Request $request)
    {   
        $query1 = $request->get('query1', null);
        $query2 = $request->get('query2') ? $request->get('query2') : "";
        $vocabs = DB::table('indicator')->select('vocab')->distinct()->get();
        $querymatchs = [];
        if($query1 || $query2){
            $querymatchs =  DB::table('indicator')->select('vocab','code','title','desc','category','source')->where('vocab','like', $query1)->orWhere('title','like',$query2)->get();
        }
        return view('search', ['query1' => $query, 'vocabs' => $vocabs,'querymatchs' => $querymatchs]);
    }

    public function individualvocab($id)
    {   

        return view('individualvocab',["id" => $id]);
    }
}
