<?php

class Equipo extends Eloquent {
	protected $guarded = array();
        protected $table = "equipo";
        public $timestamps=false;
        
        
	public static $rules = array(
		'tipo_equipo_id' => 'required|exists:tipo_equipo,id',
		'cliente_id' => 'required|exists:cliente,id',
		'descripcion_equipo' => 'required|min:10',
		'estado_general' => 'required|min:4'
	);
        
        public function cliente()
        {
            return $this->belongsTo('Cliente');
        }
        public function tipoEquipo()
        {
            return $this->belongsTo('TipoEquipo');
        }

        public function orden()
        {
            return $this->belongsToMany('Orden','equipo_orden_trabajo');
        }
}
