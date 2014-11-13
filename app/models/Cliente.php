<?php 

class Cliente extends Eloquent{
	protected $table = 'cliente';
	public $timestamps = false;
	protected $fillable = ['persona_id', 'activo'];
    
        
    public function persona()
    {
        return $this->belongsTo('Persona');
    }

    public function orden()
    {
    	return $this->belongsTo('Orden');
    }

    public function equipo()
    {
    	return $this->hasMany('equipo');
    }
    
    public function usuario()
    {
        return $this->morphMany('User','entidadUsuario');
    }
}