<?php 

class Cliente extends Eloquent{
	protected $table = 'cliente';
	public $timestamps = false;
	protected $fillable = ['persona_id', 'activo'];
    
        
    public function persona()
    {
        return $this->belongsTo('Persona');
    }
}