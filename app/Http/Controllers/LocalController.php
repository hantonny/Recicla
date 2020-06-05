<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Local;
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
        if($request->filled('nome')
        && $request->filled('lat')
        && $request->filled('lng')
        && $request->filled('endereco')){
            $nome = $request->input('nome');
            $lat = $request->input('lat');
            $lng = $request->input('lng');
            $horario_aberto = $request->input('horario_aberto');
            $horario_fechado = $request->input('horario_fechado');
            $endereco = $request->input('endereco');
            $dom = $request->input('dom');
            $seg = $request->input('seg');
            $ter = $request->input('ter');
            $qua = $request->input('qua');
            $qui = $request->input('qui');
            $sex = $request->input('sex');
            $sab = $request->input('sab');
            $dias = array($dom, $seg,  $ter, $qua, $qui, $sex, $sab);


            $data =$request->only(['nome','lat','lng','endereco']);
            $validator = Validator::make($data,[
                'nome'=>['required', 'string','max:100','unique:local'],
                'lat'=>['required', 'string','max:100','unique:local'],
                'lng'=>['required', 'string','max:100','unique:local'],
                'endereco'=>['required', 'string']
            ]);
            if($validator->fails()){
                return redirect()->route('local.add')->with('warning', 'Já existe esse local!')->withErrors($validator)->withInput();
            }else{

                $local = new Local;
                $local->nome = $nome;
                $local->lat = $lat;
                $local->lng = $lng;
                $local->horario_aberto = $horario_aberto;
                $local->horario_fechado = $horario_fechado;
                $local->dias = implode(" - ", array_filter($dias));
                $local->endereco = $endereco;
                $local->save();

                return redirect()->route('local.list')->with('success', 'Adicionado com Sucesso!');
            }
        }else{
            return redirect()->route('local.add')->with('warning', 'Não preencheu o formulário corretamente!')->withInput();
        }

    }
    public function edit($id){

        $data = Local::find($id);

        if($data){
            return view('admin.edit', ['data'=>$data]);
        }else{
            return redirect()->route('local.list');
        }


    }
    public function editAction(Request $request, $id){
        if($request->filled('nome') && $request->filled('lat') && $request->filled('lng') && $request->filled('endereco')){
            $nome = $request->input('nome');
            $lat = $request->input('lat');
            $lng = $request->input('lng');
            $horario_aberto = $request->input('horario_aberto');
            $horario_fechado = $request->input('horario_fechado');
            $endereco = $request->input('endereco');
            $dom = $request->input('dom');
            $seg = $request->input('seg');
            $ter = $request->input('ter');
            $qua = $request->input('qua');
            $qui = $request->input('qui');
            $sex = $request->input('sex');
            $sab = $request->input('sab');
            $dias = array($dom, $seg,  $ter, $qua, $qui, $sex, $sab);

            $data = Local::find($id);

            if($data){
                $data->nome = $nome;
                $data->lat = $lat;
                $data->lng = $lng;
                $data->horario_aberto = $horario_aberto;
                $data->horario_fechado = $horario_fechado;
                $data->dias = implode(" - ", array_filter($dias));
                $data->endereco = $endereco;
                $data->save();
            }
            return redirect()->route('local.list')->with('success', 'Editado com Sucesso!');
        }else{
            return redirect()->route('local.edit', ['id'=>$id])
            ->with('warning', 'Não preencheu o formulário corretamente!');
        }
    }
    public function del($id){
        Local::find($id)->delete();
        return redirect()->route('local.list')->with('success', 'Excluído com Sucesso!');
    }
}
