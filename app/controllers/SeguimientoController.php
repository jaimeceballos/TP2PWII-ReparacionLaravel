<?php

class SeguimientoController extends BaseController{


	public function porDni(){
		$input = Input::all();
		$nroOrden = $input['orden'];
		$orden = Orden::find($nroOrden);
		return Redirect::route('resultados');
	}
}