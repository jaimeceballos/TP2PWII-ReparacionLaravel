<?php

class OrdenController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
        protected $orden; 
        public function __construct(Orden $orden)
	{
		$this->orden = $orden;
	}
	public function index()
	{
            $ordenes = Orden::with('cliente','tipoOrden')->get();
            
            return View::make('orden.index',compact('ordenes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clientes = Persona::has('cliente')->lists('ape_nom','id');
		$tipoOrden = TipoOrden::all()->lists('descripcion','id');
		
                return View::make('orden.create',compact('clientes','tipoOrden'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
                
                $empleado= Auth::user()->entidad_usuario_id;
		$input = Input::all();
                $cliente = $input['cliente_id'];
		$cliente = Persona::find($cliente)->cliente->id;
                $clearInput = array(
                    'cliente_id'=>$cliente,
                    'tipo_orden_id'=>$input['tipo_orden_id'],
                    'descripcion_falla'=>$input['descripcion_falla'],
                    'fecha_entrada'=>  date("d/m/Y"),
                    'empleado_id' => $empleado
                );
                $equipos = $input['equipo'];
                
                $validation = Validator::make($clearInput, Orden::$rules);
                if($validation->passes())
                {
                    $orden = $this->orden->firstOrCreate($clearInput);
                    foreach($equipos as $item){
                        $orden->equipos()->attach($item);
                    }
                    $ordenes = Orden::with('cliente','tipoOrden')->get();
                    return View::make('orden.index',compact('ordenes'))
                                ->with('message', 'Orden Generada con exito');
                }
                return Redirect::route('orden.create')
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
        return View::make('orden.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('orden.edit');
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
