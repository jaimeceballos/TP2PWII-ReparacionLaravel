<div class="form-group">
            <label>Cliente</label>
               {{ Form::select('cliente_id',[null=>'Seleccione un Cliente']+$clientes,null,['class'=>'form-control','id'=>'cliente_id']) }}  
              
        </div>

        <div class="form-group">
            <label>Tipo Orden</label>
              {{ Form::select('tipo_orden_id',$tipoOrden,null,['class'=>'form-control']) }} 
        </div>
        <div class="form-group">
            <label>Equipo</label>
              {{ Form::select('equipo',[null=>'Seleccione un Cliente'],null,['class'=>'form-control','required'=>'required','disabled'=>'disabled','multiple','id'=>'equipo']) }} 

        </div>

        <div class="form-group">
            <label>Descripcion Falla</label>
            
              {{ Form::textarea('descripcion_falla', null, array('class'=>'form-control', 'placeholder'=>'Descripcion Falla','required'=>'required')) }}
            
        </div>

      <a href="{{ URL::route('orden.index') }}" class="btn btn-link">Cancelar</a>
      {{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-info pull-right','disabled'=>'disabled','id'=>'guardar')) }}
    
</div>