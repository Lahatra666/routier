<?php

namespace App\Http\Controllers;

use App\Models\Portion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BackController extends Controller
{
    public function back(){
        // $routes = Route::orderBy('nomroute')->get();
        // $routes = Route::with(['idvilledep'])->get();
         $routes = DB::table('routes as r')
                        ->join('villes as d','r.idvilledep','=','d.idville')
                        ->join('villes as a','r.idvillearrive','=','a.idville')
                        ->select('r.idroute','r.nomroute','r.idvilledep','r.idvillearrive','r.distance','d.nomville as villedep','a.nomville as villearrive')
                        ->get();
        // return view('back.homeback',compact('routes'));
        return view('back.homeback', [
            'routes'=>$routes
        ]);
    }
    public function showportion($idroute){
        // /liste portion
         $portions = DB::table('portions as p')
                        ->join('routes as r','r.idroute','=','p.idroute')
                        ->select('r.idroute','r.nomroute','r.idvilledep','r.idvillearrive','r.distance','p.idportion','p.debut','p.fin','p.etat',
                        DB::raw('LEAST((p.fin-p.debut)*
                        CASE etat
                            WHEN 1 THEN 30000000.0
                            WHEN 2 THEN 50000000.0
                            WHEN 3 THEN 70000000.0
                            WHEN 4 THEN 90000000.0
                            ELSE 0
                            END,999999999999.99) AS budget
                            '))
                        ->where('r.idroute','=', $idroute)
                        ->get();


            return view('back.portion', [
            'portions'=>$portions
        ]);
    }
    public function storeportion(Request $request){
        $existant = DB::table('portions')
        ->select(DB::raw('count(*) as isany'))
        ->where('idroute','=', $request->idroute)
        ->where(function($query) use($request){
            $query->where('debut','<=', $request->debut)
                  ->where('fin','>=', $request->fin);
        })
        ->orwhere(function($query2) use($request){
            $query2->where('debut','<=', $request->fin)
                  ->where('fin','>=', $request->debut);
        })
        ->get();
        $array = json_decode($existant,true);
        $int = $array[0]['isany'];
        if($int==0){
            Portion::create([
                'idroute'=>$request->idroute,
                'debut'=>$request->debut,
                'fin'=>$request->fin,
                'etat'=>$request->etat
            ]);
        }
        }
        public function exportpdf(){
        
        }

}
