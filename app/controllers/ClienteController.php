<?php

class ClienteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::with('persona')->get();
		return View::make('cliente.index',compact('clientes')); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cliente.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input,Persona::$rules);
		if($validation->passes())
		{
			$data = array(
				'ape_nom'=>$input['ape_nom'],
				'juridica'=>$input['juridica'],
				'dni'=>$input['dni'],
				'cuit'=>$input['cuit'],
				'domicilio'=>$input['domicilio'],
				'telefono'=>$input['telefono'],
				'email'=>$input['email']
			);
			
			$persona = Persona::firstOrCreate($data);

			Cliente::create(array(
        		'persona_id'=>$persona->id,
        		'activo'=>1,
        	));

			return Redirect::route('cliente.index');
		}
		return Redirect::route('cliente.create')
							->withInput()
							->withErrors($validation)
							->with('message','Error al Guardar.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
