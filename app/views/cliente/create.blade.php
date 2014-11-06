@if ($errors->any())
	<ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>

@endif


<h1>nuevo cliente</h1>


{{Form::open(['route'=>'cliente.store'])}} 
<label>Apellido y nombre</label>
{{Form::text('ape_nom','',['placeholder'=>'Apellido y nombre'])}}<br>
<label>Es juridica?</label>
{{Form::select('juridica', array('0' => 'no', '1' => 'Si'));}}<br>
<label>dni</label>
{{Form::number('dni','',['placeholder'=>'documento'])}}<br>

<label>cuit</label>
{{Form::number('cuit','',['placeholder'=>'cuit'])}}<br>
<label>domicilio</label>
{{Form::Text('domicilio','',['placeholder'=>'domicilio'])}}<br>
<label>telefono</label>
{{Form::text('telefono','',['placeholder'=>'Nro de telefono fijo o celular'])}}<br>
<label>email</label>
{{Form::email('email','',['placeholder'=>'usuario@ejemplo.com'])}}<br>

<input type="submit" value="Guardar" />
{{Form::close()}}