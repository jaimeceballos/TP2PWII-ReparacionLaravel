<?php

class EquipoController extends BaseController {

	/**
	 * Equipo Repository
	 *
	 * @var Equipo
	 */
	protected $equipo;

	public function __construct(Equipo $equipo)
	{
		$this->equipo = $equipo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getEquipoCliente($id)
	{
		$cliente = Persona::find($id)->cliente->id;
		
		$equipos = Equipo::where('cliente_id','=',$cliente)->get()->toJson();
		
        return $equipos;
	}

	public function index()
	{
		$equipos = Equipo::with('tipoEquipo','cliente')->where('baja','=','0')->get();
                //dd($equipos);
		return View::make('equipos.index', compact('equipos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
                $tipoEquipo = TipoEquipo::all()->lists('descripcion','id');
                $clientes = Persona::has('cliente')->lists('ape_nom','id');

				return View::make('equipos.create',compact('tipoEquipo','clientes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$cliente = $input['cliente_id'];
		$cliente = Persona::find($cliente)->cliente->id;
                
		$clearInput = array(
				'tipo_equipo_id'=>$input['tipo_equipo_id'],
				'cliente_id' => $cliente,
				'descripcion_equipo' => $input['descripcion_equipo'],
				'estado_general'	=> $input['estado_general']
			);
              
		$validation = Validator::make($clearInput, Equipo::$rules);

		if ($validation->passes())
		{
			$this->equipo->create($clearInput);

			return Redirect::route('equipos.index');
		}

		return Redirect::route('equipos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'Verifique los datos ingresados.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$equipo = $this->equipo->findOrFail($id);

		return View::make('equipos.show', compact('equipo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipo = $this->equipo->find($id);
                $tipoEquipo = TipoEquipo::all()->lists('descripcion','id');
                $clientes = Persona::has('cliente')->lists('ape_nom','id');
		if (is_null($equipo))
		{
			return Redirect::route('equipos.index');
		}

		return View::make('equipos.edit', compact('equipo','tipoEquipo','clientes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
                $cliente = $input['cliente_id'];
		$cliente = Persona::find($cliente)->cliente->id;
                
		$clearInput = array(
				'tipo_equipo_id'=>$input['tipo_equipo_id'],
				'cliente_id' => $cliente,
				'descripcion_equipo' => $input['descripcion_equipo'],
				'estado_general'	=> $input['estado_general']
			);
		$validation = Validator::make($clearInput, Equipo::$rules);

		if ($validation->passes())
		{
			$equipo = $this->equipo->find($id);
			$equipo->update($clearInput);

			return Redirect::route('equipos.index', $id);
		}

		return Redirect::route('equipos.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'Verifique los datos ingresados.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id'
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->equipo = $this->equipo->find($id);
                $this->equipo->update(['baja'=>1]);

		return Redirect::route('equipos.index')
                            ->with('message','Equipo Eliminado');
	}

}
