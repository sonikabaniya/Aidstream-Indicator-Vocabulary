<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Indicator;
use App\Vocabulary;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show($id)
    {
        return view('index', ["id"=>$id]);
    }

    public function sqlquery()
    {
        $vocab = Vocabulary::with('indicators')->get();
        $indicators = DB::table('indicator')->select(DB::raw('DISTINCT vocab, count(vocab) as count,standardlink'))
        ->groupBy('vocab','standardlink')
        ->get();
        $row_num = 1;
        return view('welcome', ['vocabs' => $vocab,'row_num' => $row_num]);
    }

    public function searchquery($query = NULL, Request $request)
    {   
        $vocabs = Vocabulary::with('indicators')->select()->get();
        $query1 = $request->get('query1', null);
        $query2 = $request->get('query2') ? $request->get('query2') : "";
        $mapquery1 = DB::table('Vocabulary')->select('id','vocab')->where('vocab','=',$query1)->first();
        $querymatchs = [];
        if($query1 || $query2){
            $querymatchs =  DB::table('indicator')->select('vocab','code','title','desc','category','source')->where('vocab','like', $mapquery1->id)->orWhere('title','like',$query2)->get();
        }
        $flag=0;

        return view('search', ["allindicator"=>[],'query1' => $query, 'vocabs' => $vocabs,'querymatchs' => $querymatchs, 'flag' -> $flag ]);
    }

    public function individualvocab($id)
    {   
        $mapvocab= DB::table('Vocabulary')->select('vocab','standardlink')->where('id','=',$id)->first();
        $vocabs = DB::table('indicator')->select(DB::raw('DISTINCT category, count(category) as count'))
        ->groupBy('category')->where('vocab','=',$id)
        ->get();
        $downvocabs = DB::table('indicator')->select('code','title','desc','source')->where('vocab','=',$id)->get();
        return view('individualvocab',["mapvocab" => $mapvocab,"id"=>$id,"vocabs"=>$vocabs,"downvocabs"=>$downvocabs]);
    }

    public function indicatorquery(Request $request)
    {
        $query1 = $request->get('indicatorsearch', null);
        $querymatch = DB::table('indicator')->select('vocab','code','title','desc','category','source')->where('title','like',"%$query1%")->get();
        $flag=1;
        return view('search', ['query1' =>$query1, 'vocabs' => [],'querymatchs' => $querymatch,'flag'=>$flag]);

    }


}
