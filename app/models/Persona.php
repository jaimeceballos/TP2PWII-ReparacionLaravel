<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author universidad
 */
class Persona extends Eloquent{
    protected $table = 'persona';
    public $timestamps = false;
    protected $guarded = [];


    public static $rules = array(
    		'ape_nom' => 'required|min:7|max:100',
    		'juridica'=>'required|in:0,1',
    		'dni'=>'numeric',
    		'cuit'=>'numeric',
    		'domicilio'=>'min:10',
    		'telefono'=>'min:10',
    		'email'=>'email',
            
    	);
    
    public static function validar($input)
    {
        $v = Validator::make($input,Persona::$rules);
        
        $v->sometimes(['dni'],'required',function($input){
            return $input->juridica == 0;
        });
        $v->sometimes(['cuit'],'required',function($input){
            return $input->juridica == 1;
        });
        return $v;
    }
    public function cliente()
    {
        return $this->hasOne('Cliente');
    }
    public function empleado()
    {
        return $this->hasOne('Empleado');
    }
}
