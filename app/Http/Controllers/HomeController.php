<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $datos = Curso::orderBy('id','desc')->paginate(5);
        return view('home', compact('datos'));
    }

    public function show( Curso $curso){
        //$dato = Curso::find($id);
      
        return view('show',compact('curso'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        //validacion
        $request->validate([
            'name'=> 'required|unique:cursos',
            'descripcion'=> 'required',
            'categoria'=> 'required',
        ]);

        // esta manera se agrega registros de manera masiva
        Curso::create($request->all());
        
        /*$create = new Curso();
        $create->name = $request->name;
        $create->descripcion = $request->descripcion;
        $create->categoria = $request->categoria;
        $create->save();*/

        return redirect('/');
    }

    public function edit(Curso $curso){
      
        return view('edit',compact('curso'));
    }

    public function update(Request $request,Curso $curso){
    
         $request->validate([
            'name'=> "required|unique:cursos,name,{$curso->id}",
            'descripcion'=> 'required',
            'categoria'=> 'required',
        ]);
        $curso ->update($request->all());
        /*$dato = Curso::find($dato);
        $dato->name = $request->name;
        $dato->descripcion = $request->descripcion;
        $dato->categoria = $request->categoria;
        $dato->save();*/
        return redirect('/');
    }
}
