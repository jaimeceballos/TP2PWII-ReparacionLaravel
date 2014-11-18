<?php

class SeguimientoController extends BaseController{


	public function porOrden($orden){
		
		$movimientos = MovimientosOrden::where('orden_trabajo_id','=',$orden)->get()->toJson();
		
		return $movimientos;
	}
}