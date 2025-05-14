<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $datos = Curso::orderBy('id','desc')->get();
        return view('home', compact('datos'));
    }

    public function show($id){
        $dato = Curso::find($id);
        return view('show',compact('dato'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $create = new Curso();
        $create->name = $request->name;
        $create->descripcion = $request->descripcion;
        $create->categoria = $request->categoria;
        $create->save();

        return redirect('/');
    }

    public function edit($dato){
        $dato = Curso::find($dato);
        return view('edit',compact('dato'));
    }

    public function update(Request $request,$dato){
        $dato = Curso::find($dato);
        $dato->name = $request->name;
        $dato->descripcion = $request->descripcion;
        $dato->categoria = $request->categoria;
        $dato->save();
        return redirect('/');
    }
}
