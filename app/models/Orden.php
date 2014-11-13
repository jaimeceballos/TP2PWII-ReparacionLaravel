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
        'fecha_entrada'=>'required|date_format:d/m/Y',
        'descripcion_falla'=>'required|min:10',
        'trabajo_realizado'=>'min:10',
        'fecha_finalizado'=>'date_format:d/m/Y',
        'fecha_salida'  =>'date_format:d/m/Y',
        'importe_trabajo'=>'numeric',
        'numero_factura'=>'numeric',
        'remito_entrega'=>'numeric',
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
        return $this->belongsToMany('Equipo','equipo_orden_trabajo','equipo_id','orden_trabajo_id');
    }
    public function tipoOrden()
    {
        return $this->belongsTo('TipoOrden');
    }
}
