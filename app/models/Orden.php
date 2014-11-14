<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orden
 *
 * @author universidad
 */
class Orden extends Eloquent{
    //put your code here
    protected $table = 'orden_trabajo';
    public $timestamps = false;
    protected $guarded = [];
    
    public static $rules = array(
        'empleado_id' => 'required|exists:empleado,id',
        'cliente_id'  => 'required|exists:cliente,id',
        'tipo_orden_id'=>'required|exists:tipo_orden,id',
        'fecha_entrada'=>'required|date_format:Y-m-d H:i:s',
        'descripcion_falla'=>'required|min:10',
        'trabajo_realizado'=>'sometimes|required|min:10',
        'fecha_finalizado'=>'date_format:Y-m-d H:i:s',
        'fecha_salida'  =>'date_format:Y-m-d H:i:s',
        'importe_trabajo'=>'sometimes|required|numeric',
        'numero_factura'=>'sometimes|required|numeric',
        'remito_entrega'=>'numeric',
        'presupuesto'=>'sometimes|required|exists:orden_trabajo,id'
    );

    public function empleado()
    {
        return $this->belongsTo('Empleado');
    }

    public function cliente()
    {
        return $this->belongsTo('Cliente');
    }

    public function equipos()
    {
        return $this->belongsToMany('Equipo','equipo_orden_trabajo','orden_trabajo_id','equipo_id');
    }
    public function tipoOrden()
    {
        return $this->belongsTo('TipoOrden');
    }

    /*public function valida($input){

        $v = Validator::make($input, self::$rules);

        $v->sometimes
    }*/
}
