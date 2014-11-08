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
	public function index()
	{
		$equipos = Equipo::with('tipoEquipo','cliente')->get();
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
                $tipoEquipo = TipoEquipo::all();
                $clientes = Cliente::with('persona')->get();
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
		$validation = Validator::make($input, Equipo::$rules);

		if ($validation->passes())
		{
			$this->equipo->create($input);

			return Redirect::route('equipos.index');
		}

		return Redirect::route('equipos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
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

		if (is_null($equipo))
		{
			return Redirect::route('equipos.index');
		}

		return View::make('equipos.edit', compact('equipo'));
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
		$validation = Validator::make($input, Equipo::$rules);

		if ($validation->passes())
		{
			$equipo = $this->equipo->find($id);
			$equipo->update($input);

			return Redirect::route('equipos.show', $id);
		}

		return Redirect::route('equipos.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->equipo->find($id)->delete();

		return Redirect::route('equipos.index');
	}

}
