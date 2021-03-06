<?php

class ClienteController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check())
		{
		
		}
		$clientes = Cliente::with('persona')->where('activo','=','1')->get();

		return View::make('cliente.index',compact('clientes')); 
	}

	public function registro()
	{
		$conf=false;
		return View::make('registro.index',compact('conf'));
	}
	public function registroStore()
	{
		$input = Input::all();
		$input['rol'] = 'cliente';
		$validation = Persona::validar($input);
		if($validation->passes())
		{
			$validationUser = Validator::make($input,User::$rules);
			if($validationUser->passes())
			{
				


				
				if($input['juridica'] === 1){
					$data = array(
						'ape_nom'=>$input['ape_nom'],
						'juridica'=>$input['juridica'],
						'cuit'=>$input['cuit']
					);
				}else{
					$data = array(
						'ape_nom'=>$input['ape_nom'],
						'juridica'=>$input['juridica'],
						'dni'=>$input['dni']
					);
				}
				
				

				$persona = Persona::firstOrCreate($data);
				
				$data = array(
					'ape_nom'=>$input['ape_nom'],
					'juridica'=>$input['juridica'],
					'dni'=>$input['dni'],
					'cuit'=>$input['cuit'],
					'domicilio'=>$input['domicilio'],
					'telefono'=>$input['telefono'],
					'email'=>$input['email']					
				);
				
				$persona->update($data);

				$cliente = Cliente::firstOrCreate(array(
	        		'persona_id'=>$persona->id
	        	));


	        	$userInput = array(
	        		'username' => $input['username'],
	        		'password'	=> Hash::make($input['password']),
	        		'rol'		=> $input['rol'],
	        		'entidad_usuario_type'=>'Cliente',
	        		'entidad_usuario_id' => $cliente->id	
	        	);

	        	User::create($userInput);
	        	
	        	return Redirect::route('registro',['conf'=>'ok']);
							
			}
			return Redirect::route('registro')
							->withInput()
							->withErrors($validationUser)
							->with('message','Error Verifique los datos.');
		}
		return Redirect::route('registro')
							->withInput()
							->withErrors($validation)
							->with('message','Error Verifique los datos.');
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
		$validation = Persona::validar($input);
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
		$cliente = Cliente::find($id);
		$persona = Persona::find($cliente->persona_id);
		

		if (is_null($persona))
		{
			return Redirect::route('cliente.index');
		}
		
		return View::make('cliente.edit', compact('persona','cliente'));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$validation = Validator::make($input,Persona::$rules);
		if($validation->passes())
		{
			$dataper = array(
				'ape_nom'=>$input['ape_nom'],
				'juridica'=>$input['juridica'],
				'dni'=>$input['juridica']== 0 ? $input['dni'] : 0,
				'cuit'=>$input['juridica']==1 ? $input['cuit'] : 0,
				'domicilio'=>$input['domicilio'],
				'telefono'=>$input['telefono'],
				'email'=>$input['email']
			);
			//dd($dataper);
			$datacli = ['activo'=>!empty($input['activo']) ? $input['activo'] : 0];
			$cliente = Cliente::find($id);
			$cliente->update($datacli);
			$persona = Persona::find($cliente->persona_id);
			$persona->update($dataper);
			return Redirect::route('cliente.index')
								->with('message','cliente actualizado.');

		}
		return Redirect::route('cliente.edit',$id)
							->withInput()
							->withErrors($validation)
							->with('message', 'No se pudo modificar.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = Cliente::find($id);
		$cliente->update(['activo'=>0]);

		return Redirect::route('cliente.index')
				->with('message','Cliente borrado.');
	}


}
