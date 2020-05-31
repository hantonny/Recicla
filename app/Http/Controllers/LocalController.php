<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Local;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LocalController extends Controller{
    public function gerar_mapa(){
        $locais = Local::all();

        $array = array('locais'=>$locais);

        return view('local',$array);
    }
    public function list(){
        $list = Local::paginate(5);
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
            $horario_aberto = $request->input('horario_aberto');
            $horario_fechado = $request->input('horario_fechado');

            $data =$request->only(['nome','lat','lng']);
            $validator = Validator::make($data,[
                'nome'=>['required', 'string','max:100','unique:local'],
                'lat'=>['required', 'string','max:100','unique:local'],
                'lng'=>['required', 'string','max:100','unique:local']
            ]);
            if($validator->fails()){
                return redirect()->route('local.add')->with('warning', 'Já existe esse local!')->withErrors($validator)->withInput();
            }else{
                DB::insert('INSERT INTO local (nome,lat,lng,horario_aberto,horario_fechado) VALUES (:nome, :lat, :lng, :horario_aberto, :horario_fechado)',
                ['nome'=>$nome,'lat'=>$lat,'lng'=>$lng, 'horario_aberto'=>$horario_aberto, 'horario_fechado'=>$horario_fechado]);
                return redirect()->route('local.list')->with('success', 'Adicionado com Sucesso!');
            }
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
            $horario_aberto = $request->input('horario_aberto');
            $horario_fechado = $request->input('horario_fechado');

            $data = DB::select('SELECT * FROM local WHERE id = :id',[
                'id'=>$id
            ]);

            if(count($data)>0){
                DB::update('UPDATE local SET nome = :nome, lat = :lat, lng = :lng, horario_aberto = :horario_aberto,
                horario_fechado = :horario_fechado WHERE id = :id',[
                    'id'=> $id,
                    'nome'=>$nome,
                    'lat'=>$lat,
                    'lng'=>$lng,
                    'horario_aberto'=>$horario_aberto,
                    'horario_fechado'=>$horario_fechado
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
