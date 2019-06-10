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
        // $indicators = DB::table('indicator')->select(DB::raw('DISTINCT vocab, count(vocab) as count,standardlink'))
        // ->groupBy('vocab','standardlink')
        // ->get();
        $row_num = 1;
        return view('welcome', ['vocabs' => $vocab,'row_num' => $row_num]);
    }

    public function searchquery($query = NULL, Request $request)
    {   
        $vocabs = Vocabulary::with('indicators')->select()->get();
        $vocabid = $request->get('vocabid', null);
        if($vocabid == 'All Vocab'){
            $vocabid= NULL;
        }
        $query = $request->get('query') ? $request->get('query') : "";
        $indicatorsearch = $request->get('indicatorsearch', null);

        $mapquery1 = DB::table('Vocabulary')->select('id','vocab')->where('vocab','=',$vocabid)->first();
        $querymatchs = [];
        if($vocabid || $query){
        $vocab = Vocabulary::with('indicators')->get();
            $querymatchs =  Indicator::with('vocabulary')->where('vocab','like', $mapquery1->id)->orWhere('title','like',$query)->get();
            // $vocabid = DB::table('Vocabulary')->select('vocab')->where('id','like', $mapquery1->id)->get();
        }
        
        return view('search', ["allindicator"=>[],'vocabid' => $vocabid, 'vocabs' => $vocabs,'querymatchs' => $querymatchs,'vocabid'=>$vocabid]);
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
        $query = $request->get('indicatorsearch', null);
        $querymatch = Indicator::with('vocabulary')->where('title','like',"%$query%")->get();
        $vocabs = Vocabulary::with('indicators')->select()->get();

      
        return view('search', ['query' =>$query, 'vocabid' => [], 'vocabs' => $vocabs,'querymatchs' => $querymatch]);

    }


}
