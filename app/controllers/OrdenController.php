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
            $ordenes = Orden::with('cliente','tipoOrden')->where('fecha_salida','=',null)->orderBy('fecha_entrada','desc')->get();
            
            $dia = date('d/m/Y');
            
            return View::make('orden.index',compact('ordenes','dia'));
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
                    'fecha_entrada'=>  date("Y-m-d H:i:s"),
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
                	$tipoOrden = TipoOrden::find($clearInput['tipo_orden_id']);
                	$logInput = array(
                			'orden_trabajo_id' => $orden->id,
                			'usuario_id'	=> Auth::user()->id,
                			'movimiento' => $tipoOrden->descripcion == 'presupuesto' ? 'Ingreso para presupuesto' : 'Ingreso para reparacion'
                		);
                	$logValidation = Validator::make($logInput,MovimientosOrden::$rules);
                	if($logValidation->passes())
                	{
                		MovimientosOrden::create($logInput);
                	}

                		
                	
                	$ordenes = Orden::with('cliente','tipoOrden')->get();
                	$dia = date('d/m/Y');
                	return View::make('orden.index',compact('ordenes','dia'))
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
		$orden = Orden::find($id);
		$clientes = Persona::has('cliente')->lists('ape_nom','id');
		$tipoOrden = TipoOrden::all()->lists('descripcion','id');
        return View::make('orden.edit',compact('orden','tipoOrden','clientes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->orden = Orden::with('tipoOrden')->find($id);

		if($this->orden->tipoOrden->descripcion == 'presupuesto' && !$this->orden->presupuestado){
			
			$input = Input::all();

			$clearInput = array(
                    'cliente_id'=>$this->orden->cliente_id,
                    'tipo_orden_id'=>$this->orden->tipo_orden_id,
                    'descripcion_falla'=>$this->orden->descripcion_falla,
                    'fecha_entrada'=>  $this->orden->fecha_entrada,
                    'empleado_id' => $this->orden->empleado_id,
                    'trabajo_realizado' => $input['trabajo_realizado'],
                    'remito_entrega'=> $input['remito_entrega'],
                    'presupuestado' => true,
                    'fecha_finalizado'=>date("Y-m-d H:i:s")
                );

			$validation= Validator::make($clearInput,Orden::$rules);
			if($validation->passes()){
				$this->orden->update($clearInput);

				$logInput = array(
        			'orden_trabajo_id' => $id,
        			'usuario_id'	=> Auth::user()->id,
        			'movimiento' => 'Presupuestado. Trabajo Sugerido: '.$input['trabajo_realizado']
        		);
            	$logValidation = Validator::make($logInput,MovimientosOrden::$rules);
            	if($logValidation->passes())
            	{
            		MovimientosOrden::create($logInput);
            	}

            	$dia = date('d/m/Y');

				return Redirect::route('orden.index',$id)
							->with('message', 'Presupuesto Generado.');				
			}

			return Redirect::route('orden.edit',$id)
							->withInput()
							->withErrors($validation)
							->with('message', 'No se pudo modificar.');


		}elseif($this->orden->tipoOrden->descripcion == 'reparacion'){
			$input = Input::all();

			$clearInput = array(
                    'cliente_id'=>$this->orden->cliente_id,
                    'tipo_orden_id'=>$this->orden->tipo_orden_id,
                    'descripcion_falla'=>$this->orden->descripcion_falla,
                    'fecha_entrada'=>  $this->orden->fecha_entrada,
                    'empleado_id' => $this->orden->empleado_id,
                    'trabajo_realizado' => $input['trabajo_realizado'],
                    'remito_entrega'=> $input['remito_entrega'],
                    'fecha_finalizado'=>date("Y-m-d H:i:s"),
                    'importe_trabajo'=>$input['importe_trabajo'],
                    'nro_factura'=>$input['nro_factura']
                );
			$validation= Validator::make($clearInput,Orden::$rules);
			if($validation->passes()){
				$this->orden->update($clearInput);
				$logInput = array(
        			'orden_trabajo_id' => $id,
        			'usuario_id'	=> Auth::user()->id,
        			'movimiento' => 'Trabajo Finalizado: '.$input['trabajo_realizado'].' Costo $'.$input['importe_trabajo']
        		);
            	$logValidation = Validator::make($logInput,MovimientosOrden::$rules);
            	if($logValidation->passes())
            	{
            		MovimientosOrden::create($logInput);
            	}

				return Redirect::route('orden.index',$id)
							->with('message', 'Presupuesto Generado.');				
			}

			return Redirect::route('orden.edit',$id)
							->withInput()
							->withErrors($validation)
							->with('message', 'No se pudo modificar.');
		}
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

	public function entrega($id){
		$this->orden = Orden::with('tipoOrden')->find($id);
		$input = Input::all();

		$clearInput = array(
	            'cliente_id'=>$this->orden->cliente_id,
	            'tipo_orden_id'=>$this->orden->tipo_orden_id,
	            'descripcion_falla'=>$this->orden->descripcion_falla,
	            'fecha_entrada'=>  $this->orden->fecha_entrada,
	            'empleado_id' => $this->orden->empleado_id,
	            'trabajo_realizado' => $this->orden->trabajo_realizado,
	            'remito_entrega'=> $input['remito2'],
	            'presupuestado' => $this->orden->presupuestado,
	            'fecha_finalizado'=>$this->orden->fecha_finalizado,
	            'fecha_salida'=> date("Y-m-d H:i:s")
	        );
		$validation= Validator::make($clearInput,Orden::$rules);
		if($validation->passes()){
			$this->orden->update($clearInput);

			$logInput = array(
    			'orden_trabajo_id' => $id,
    			'usuario_id'	=> Auth::user()->id,
    			'movimiento' => 'Equipo Entregado Remito Nro.: '.$clearInput['remito_entrega'].' Fecha: '.$clearInput['fecha_salida']
    		);
        	$logValidation = Validator::make($logInput,MovimientosOrden::$rules);
        	if($logValidation->passes())
        	{
        		MovimientosOrden::create($logInput);
        	}

			return Redirect::route('orden.index',$id)
						->with('message', 'Entrega registrada.');				
		}

		return Redirect::route('orden.edit',$id)
						->withInput()
						->withErrors($validation)
						->with('message', 'No se pudo registrar la entrega, por favor intente otra vez.');
	}
	public function generar($id){
		$this->orden = Orden::find($id);
		
		$fecha = date("Y-m-d H:i:s");
		$clearInput = array(
	            'cliente_id'=>$this->orden->cliente_id,
	            'tipo_orden_id'=> TipoOrden::where('descripcion','=','reparacion')->get()->first()->id,
	            'descripcion_falla'=>$this->orden->descripcion_falla,
	            'fecha_entrada'=>  $fecha,
	            'empleado_id' => $this->orden->empleado_id,
	            'presupuesto'=>$this->orden->id
	            
	        );
		$equipos = $this->orden->equipos();
		$validation= Validator::make($clearInput,Orden::$rules);
		if($validation->passes()){
			$orden = $this->orden->firstOrCreate($clearInput);
			foreach($equipos as $item){
                $orden->equipos()->attach($item->id);
            }
            Orden::find($id)->update(array(
            		'fecha_salida'=>$fecha
            	));
            $logInput = array(
    			'orden_trabajo_id' => $id,
    			'usuario_id'	=> Auth::user()->id,
    			'movimiento' => 'Presupuesto Aceptado su numero de orden de reparacion es: '.$orden->id
    		);
        	$logValidation = Validator::make($logInput,MovimientosOrden::$rules);
        	if($logValidation->passes())
        	{
        		MovimientosOrden::create($logInput);
        	}

        	$logInput2 = array(
        			'orden_trabajo_id' => $orden->id,
        			'usuario_id'	=> Auth::user()->id,
        			'movimiento' => 'Ingreso para reparacion'
        		);
        	$logValidation = Validator::make($logInput2,MovimientosOrden::$rules);
        	if($logValidation->passes())
        	{
        		MovimientosOrden::create($logInput2);
        	}

			return Redirect::route('orden.index',$id)
						->with('message', 'Orden Generada con exito.');				
		}

		return Redirect::route('orden.edit',$id)
						->withInput()
						->withErrors($validation)
						->with('message', 'No se pudo registrar la Orden, por favor intente otra vez.');
	}
}
