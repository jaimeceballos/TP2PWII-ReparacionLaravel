<?php

class MovimientosOrden extends Eloquent{

	protected $table = 'movimientos_orden';
	protected $guarded = [];

	public static $rules = array(
			'orden_trabajo_id' => 'required|exists:orden_trabajo,id',
        	'usuario_id'  => 'required|exists:usuario,id',
        	'movimiento' => 'required|min:5'	
 
		);

}