<?php 

class Empleado extends Eloquent{
	
	protected $table ='empleado';
	public $timestamps = false;
	protected $guarded =[];


	public function persona()
	{
		return $this->belongsTo('Persona');
	}
	public function orden()
    {
        return $this->hasMany('Orden');
    }
    
    public function usuario()
    {
        return $this->morphMany('User','entidadUsuario');
    }
}