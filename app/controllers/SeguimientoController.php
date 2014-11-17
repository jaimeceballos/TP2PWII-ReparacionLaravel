<?php

class SeguimientoController extends BaseController{


	public function porDni(){
		$input = Input::all();
		$dni = $input['dni'];
		//dd($dni);
		$persona = Persona::where('dni','like',$dni)->get();
		dd($persona);
		$ordenes = Orden::with('cliente')->get();
		$orden = $ordenes::where('cliente');
	}
}