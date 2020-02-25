<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Local;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LocalController extends Controller{
    public function listar_local(){
        $locais = Local::all();

        $array = array('locais'=>$locais);
        
        return view('local',$array);
    }
    public function list(){
        $list = Local::paginate(4);
        return view('admin.list', ['list'=>$list]);
    }
    public function add(){
        return view('admin.add');
    }
    public function addAction(Request $request){
        if($request->filled('nome') && $request->filled('lat') && $request->filled('lng')){
            $nome = $request->input('nome');
            $lat = $request->input('lat');
            $lng = $request->input('lng');
            
            DB::insert('INSERT INTO local (nome,lat,lng) VALUES (:nome, :lat, :lng)', 
            ['nome'=>$nome,'lat'=>$lat,'lng'=>$lng]);
            return redirect()->route('local.list')->with('success', 'Adicionado com Sucesso!');
        }else{
            return redirect()->route('local.add')->with('warning', 'Não preencheu o formulário corretamente!')->withInput();
        }
        
    }
    public function edit($id){
        $data = DB::select('SELECT * FROM local WHERE id = :id',[
            'id'=>$id
        ]);

        if(count($data)>0){
            return view('admin.edit', ['data'=>$data[0]]);
        }else{
            return redirect()->route('local.list');
        }

        
    }
    public function editAction(Request $request, $id){
        if($request->filled('nome') && $request->filled('lat') && $request->filled('lng')){
            $nome = $request->input('nome');
            $lat = $request->input('lat');
            $lng = $request->input('lng');

            $data = DB::select('SELECT * FROM local WHERE id = :id',[
                'id'=>$id
            ]);
    
            if(count($data)>0){
                DB::update('UPDATE local SET nome = :nome, lat = :lat, lng = :lng WHERE id = :id',[
                    'id'=> $id,
                    'nome'=>$nome,
                    'lat'=>$lat,
                    'lng'=>$lng
                ]);
            
            }
            return redirect()->route('local.list')->with('success', 'Editado com Sucesso!');
        }else{
            return redirect()->route('local.edit', ['id'=>$id])
            ->with('warning', 'Não preencheu o formulário corretamente!');
        }
    }
    public function del($id){
        DB::delete('DELETE FROM local WHERE id = :id',[
            'id'=>$id
        ]);
        return redirect()->route('local.list')->with('success', 'Excluído com Sucesso!');
    }
}
