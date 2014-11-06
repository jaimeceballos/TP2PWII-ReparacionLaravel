<?php 

class Cliente extends Eloquent{
	protected $table = 'cliente';
	public $timestamps = false;

	public function persona()
    {
        return $this->belongsTo('Persona');
    }
}