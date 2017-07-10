<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargos;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

class ImportController extends Controller
{
    
    public function import(Request $request)
    {
		
        $file = $request->file('fichero');

		if(!empty($file)){

			$archivo = $file->getClientOriginalName();
			$archivo_extencion = $file->getClientOriginalExtension();


			if($archivo_extencion != "xls"){

				Session::flash('error','El formato del archivo debe ser xls');

			}else{

			    	\Storage::disk('local')->put($archivo,  \File::get($file));

			      	Excel::selectSheetsByIndex(0)->load($archivo, function($reader){
					//Excel::load($archivo, function($reader) {

			 		foreach ($reader->get() as $encargo) {
			 			Encargos::create([
			 				'albaran' => $encargo->albaran,
			 				'destinatario' =>$encargo->destinatario,
			 				'direccion' =>$encargo->direccion,
			 				'poblacion' => $encargo->poblacion,
			 				'cp' =>$encargo->cp,
			 				'provincia' =>$encargo->provincia,
			 				'telefono' => $encargo->telefono,
			 				'observaciones' =>$encargo->observaciones,
			 				'fecha' =>$encargo->fecha
			 			]);
			  		}
				});

			    Session::flash('mensaje','El archivo fue procesado con éxito');
			    
			}

  		}else{

  			Session::flash('error','No se adjunto ningún archivo');

  		}


      return Redirect::to('/'); 

    }
}

