<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Persona;


class SitioController extends Controller
{
    public function contacto($codigo = null){

        if($codigo == '1234'){
            $nombre = "Fercho";
            $email = "fer@gmail.com";
        }
        else{
            $nombre = "";
            $email = "";
        }
        return view('contacto', compact('nombre', 'email', 'codigo'));
    }

    public function landingpage(){
        return view('landingpage');
    }

    public function recepcion_validacion(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'suggestions'=>'required'
        ]);

        // $nuevo_registro = new Persona;
        // $nuevo_registro->name = $request->name;
        // $nuevo_registro->email = $request->email;
        // $nuevo_registro->suggestions = $request->suggestions;
        // $nuevo_registro->save();

        $registro = Persona::create(['name'=> $request->name,
                                    'email' => $request->email,
                                    'suggestions' => $request->suggestions]);

        $personas = Persona::all();
        
        foreach($personas as $persona){
            echo $persona->id; echo "  ";
            echo $persona->name; echo "  ";
            echo $persona->email; echo "  ";
            echo $persona->suggestions; echo "  ";
            echo $persona->created_at; echo "  ";
            echo $persona->updated_at; echo "  ";
            echo "<br>";
        }
        


    }
}
