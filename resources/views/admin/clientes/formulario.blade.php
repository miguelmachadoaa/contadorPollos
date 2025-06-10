<form 
    id="crearCliente"
    @if(isset($cliente))
        action="{{ route('admin.clientes.store') }}"
    @else
        action="{{ route('admin.clientes.store') }}"
    @endif
    method="POST">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <h3>Datos Personales</h3>
        </div>
    </div>

    @if(isset($cliente))
        <input type="hidden" class="form-control requerido" id="id" name="id" value="{{$cliente->id}}">
    @endif

    <div class="form-group row">

        <div class="col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control requerido alfanumerico" id="nombre" name="nombre"
            @if(isset($cliente))
                value="{{ $cliente->nombre }}"
            @endif
            required>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control requerido alfanumerico" id="apellido" name="apellido"
            @if(isset($cliente))
                value="{{ $cliente->apellido }}"
            @endif

            required>
            <span class="text-danger"></span>

        </div>

    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control requerido email" id="email" name="email" 
            @if(isset($cliente))
                value="{{ $cliente->email }}"
            @endif
            required>
            <span class="text-danger"></span>
        </div>


        <div class="col-sm-1">
            <label for="ciudad">Tipo</label>
            <select class="form-control requerido" id="tipo_documento" name="tipo_documento" required>
                @if(isset($cliente))

                    <option value="">Seleccione</option>
                    <option value="V"  {{($cliente->tipo_documento=='V')?'Selected':''}}   >V</option>
                    <option value="E" {{($cliente->tipo_documento=='E')?'Selected':''}}>E</option>
                    <option value="J" {{($cliente->tipo_documento=='J')?'Selected':''}}>J</option>
                    <option value="G" {{($cliente->tipo_documento=='G')?'Selected':''}}>G</option>

                @else
                    <option Selected value="V">V</option>
                    <option value="E">E</option>
                    <option value="J">J</option>
                    <option value="G">G</option>
                @endif
                
            </select>
        </div>

        <div class="col-md-5">
            <label for="documento">Documento</label>
            <input type="text" class="form-control requerido numerico" id="documento" name="documento" 
            @if(isset($cliente))
                value="{{ $cliente->documento }}"
            @endif
            required>
            <span class="text-danger"></span>
        </div>
    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <label for="profesion">Profesión</label>
            <input type="text" class="form-control requerido alfanumerico"  id="profesion" name="profesion" 
            @if(isset($cliente))
                value="{{ $cliente->profesion }}"
            @endif

            required>

            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="estado">Estado Civil</label>
            <select class="form-control requerido" id="estadoCivil" name="estadoCivil" required>
                @if(isset($cliente))

                    <option value="">Seleccione</option>
                    <option value="Soltero"  {{($cliente->estado_civil=='Soltero')?'Selected':''}}   >Soltero</option>
                    <option value="Casado" {{($cliente->estado_civil=='Casado')?'Selected':''}}>Casado</option>
                    <option value="Viudo" {{($cliente->estado_civil=='Viudo')?'Selected':''}}>Viudo</option>
                    <option value="Divorcado" {{($cliente->estado_civil=='Divorcado')?'Selected':''}}>Divorcado</option>

                @else
                    <option value="">Seleccione</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Viudo">Viudo</option>
                    <option value="Divorcado">Divorcado</option>
                @endif

                
            </select>
            <span class="text-danger"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label for="fechaNacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control requerido" id="fechaNacimiento" name="fechaNacimiento" format="DD/MM/YYYY" min="1900-01-01" max="today"
            @if(isset($cliente))
                value="{{ $cliente->fecha_nacimiento }}"
            @endif

                required>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="genero">Género</label>
            <select class="form-control requerido" id="genero" name="genero" required>
                <option value="">Seleccione</option>
                @if(isset($cliente))
                    <option value="Masculino" {{($cliente->sexo=='Masculino')?'Selected':''}}>Masculino</option>
                    <option value="Femenino" {{($cliente->sexo=='Femenino')?'Selected':''}}>Femenino</option>
                @else
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                @endif

                
            </select>
            <span class="text-danger"></span>
        </div>

    </div>




    <div class="row">
        <div class="col-md-12">
            <h3>Redes Sociales</h3>
        </div>
    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <label for="nombre">Facebook</label>
            <input type="text" class="form-control  " id="facebook" name="facebook"
            @if(isset($cliente))
                value="{{ $cliente->facebook }}"
            @endif
            >
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="apellido">Twitter</label>
            <input type="text" class="form-control  " id="twitter" name="twitter"
            @if(isset($cliente))
                value="{{ $cliente->twitter }}"
            @endif

            >
            <span class="text-danger"></span>

        </div>

    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <label for="nombre">Instagram</label>
            <input type="text" class="form-control  " id="instagram" name="instagram"
            @if(isset($cliente))
                value="{{ $cliente->instagram }}"
            @endif
            >
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="apellido">TikTok</label>
            <input type="text" class="form-control  " id="tiktok" name="tiktok"
            @if(isset($cliente))
                value="{{ $cliente->tiktok }}"
            @endif

            >
            <span class="text-danger"></span>

        </div>

    </div>


    <div class="form-group row">
        <div class="col-md-12">
            <label for="observaciones">Observaciones</label>
            <textarea
            class="form-control "
            id="observaciones"
            name="observaciones"
            rows="3">
            @if(isset($cliente))
                {{ $cliente->observaciones }}
            @endif
            </textarea>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Datos de Contacto
            </h3>
        </div>

    </div>

    <div class="telefonos">

    @if(isset($cliente))
        @foreach($cliente->telefonos as $telefono)
            <div class="row i_telefono">
                <div class="col-md-5  ">
                    <label for="tipoTelefono">Tipo de Teléfono</label>
                    <select
                    class="form-control requerido tipoTelefono"
                    id="tipoTelefono_{{$loop->index}}"
                    name="tipoTelefono_{{$loop->index}}" required>
                        <option value="">Seleccione</option>
                        <option value="Fijo" {{($telefono->tipo=='telefono')?'Selected':''}}>Fijo</option>
                        <option value="Celular" {{($telefono->tipo=='celular')?'Selected':''}}>Celular</option>
                    </select>
                    <span class="text-danger"></span>
                </div>

                <div class="col-md-6 ">
                    <label for="telefono">Teléfono</label>
                    <input
                    type="text"
                    class="form-control requerido telefono numerico"
                    id="telefono_{{$loop->index}}"
                    name="telefono_{{$loop->index}}"
                    value="{{ $telefono->telefono }}"
                    required>
                    <span class="text-danger"></span>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        @endforeach

    @else


    <div class="row i_telefono">
        

        <div class="col-md-6 ">
            <label for="telefono">Teléfono 1</label>
            <input type="text" class="form-control requerido telefono numerico" id="telefono_0" name="telefono_0"
            required>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6 ">
            <label for="telefono">Teléfono 2</label>
            <input type="text" class="form-control requerido telefono numerico" id="telefono_1" name="telefono_1"
            required>
            <span class="text-danger"></span>
        </div>
        
    </div>

  

    @endif

</div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Datos de Domicilio
            </h3>
        </div>

    </div>

    <div class="direcciones">

        @if(isset($cliente->direcciones))
            @foreach($cliente->direcciones as $direccion)

                <div class="row i_direccion mt-4">
                    <div class="col-md-6">
                        <label for="direccion">Dirección</label>
                        <input
                        type="text"
                        class="form-control requerido"
                        id="direccion"
                        name="direccion"
                        value="{{ $direccion->direccion }}"
                        required >

                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-6">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control requerido alfanumerico" id="ciudad" name="ciudad"
                        value="{{ $direccion->ciudad }}"
                        required >
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-sm-6">
                        <label for="ciudad">Sector</label>
                        <input type="text" class="form-control requerido" id="urbanizacion" name="urbanizacion"
                        value="{{ $direccion->urbanizacion }}"
                        required >
                        <span class="text-danger"></span>

                    </div>

                    <div class="col-sm-6">
                        <label for="ciudad">Propiedad</label>

                        <select class="form-control requerido" id="propiedad" name="propiedad" required>
                            @if(isset($cliente))
            
                                <option value="">Seleccione</option>
                                <option value="Propia"  {{($direccion->propiedad=='Propia')?'Selected':''}}   >Propia</option>
                                <option value="Alquilada" {{($direccion->propiedad=='Alquilada')?'Selected':''}}>Alquilada</option>
                                <option value="Familiar" {{($direccion->propiedad=='Familiar')?'Selected':''}}>Familiar</option>
            
                            @else
                                <option value="">Seleccione</option>
                                <option value="Propia">Propia</option>
                                <option value="Alquilada">Alquilada</option>
                                <option value="Familiar">Familiar</option>
                            @endif
                            
                        </select>

                    </div>

                </div>
            @endforeach

        @else
 
            <div class="row i_direccion mt-4">
                    
                <div class="col-md-6">
                    <label for="direccion">Dirección</label>
                    <input 
                    type="text"
                    class="form-control requerido"
                    id="direccion"
                    name="direccion"
                    @if(isset($cliente))
                        value="{{ $cliente->direccion }}"
                    @endif
                    required>

                    <span class="text-danger"></span>
                </div>

                <div class="col-md-6">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control requerido alfanumerico" id="ciudad" name="ciudad" 
                    @if(isset($cliente))
                        value="{{ $cliente->ciudad }}"
                    @endif

                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-sm-6">
                    <label for="ciudad">Sector</label>
                    <input type="text" class="form-control requerido" id="urbanizacion" name="urbanizacion" 
                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-sm-6">
                    <label for="ciudad">Propiedad</label>
                    <select class="form-control requerido" id="propiedad" name="propiedad" required>
                        @if(isset($cliente))
        
                            <option value="">Seleccione</option>
                            <option value="Propia"  {{($cliente->propiedad=='Propia')?'Selected':''}}   >Propia</option>
                            <option value="Alquilada" {{($cliente->propiedad=='Alquilada')?'Selected':''}}>Alquilada</option>
                            <option value="Familiar" {{($cliente->propiedad=='Familiar')?'Selected':''}}>Familiar</option>
        
                        @else
                            <option value="">Seleccione</option>
                            <option value="Propia">Propia</option>
                            <option value="Alquilada">Alquilada</option>
                            <option value="Familiar">Familiar</option>
                        @endif
                        
                    </select>
                </div>
            </div>

        @endif

    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Referencias
            </h3>
        </div>
    </div>

    @if( isset($cliente ) && count($cliente->referencias))

        @foreach($cliente->referencias as $referencia)
            <div class="row">
                <div class="col-md-3">
                    <label for="nombreReferencia1">Nombre  {{$loop->index}}</label>
                    <input
                    type="text"
                    class="form-control requerido alfanumerico"
                    id="nombreReferencia{{$loop->index}}"
                    name="nombreReferencia{{$loop->index}}"
                    value="{{ $referencia->nombre }}"
                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-md-3">
                    <label for="apellidoReferencia1">Apellido  {{$loop->index}}</label>
                    <input
                    type="text"
                    class="form-control requerido alfanumerico"
                    id="apellidoReferencia{{$loop->index}}"
                    name="apellidoReferencia{{$loop->index}}"
                    value="{{ $referencia->apellido }}"
                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-md-3">
                    <label for="telefonoReferencia{{$loop->index}}">Parentesco  {{$loop->index}}</label>
                    <input
                    type="text"
                    class="form-control requerido alfanumerico"
                    id="parentescoReferencia{{$loop->index}}"
                    name="parentescoReferencia{{$loop->index}}"
                    value="{{ $referencia->parentesco }}"
                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-md-3">
                    <label for="telefonoReferencia{{$loop->index}}">Teléfono  {{$loop->index}}</label>
                    <input
                    type="text"
                    class="form-control requerido numerico" 
                    id="telefonoReferencia{{$loop->index}}"
                    name="telefonoReferencia{{$loop->index}}"
                    value="{{ $referencia->telefono }}"
                    required>
                    <span class="text-danger"></span>
                </div>

                
            
            </div>
        @endforeach

    @else

        <div class="row">
            <div class="col-md-3">
                <label for="nombreReferencia0">Nombre  1</label>
                <input
                type="text"
                class="form-control requerido alfanumerico"
                id="nombreReferencia0"
                name="nombreReferencia0" required>
                <span class="text-danger"></span>
            </div>

            <div class="col-md-3">
                <label for="apellidoReferencia0">Apellido  1</label>
                <input
                type="text"
                class="form-control requerido alfanumerico"
                id="apellidoReferencia0"
                name="apellidoReferencia0" required>
                <span class="text-danger"></span>
            </div>
            <div class="col-md-3">
                <label for="parentescoReferencia0">Parentesco  1</label>
                <input
                type="text"
                class="form-control requerido alfanumerico"
                id="parentescoReferencia0"
                name="parentescoReferencia0"
                required>
                <span class="text-danger"></span>
            </div>

            <div class="col-md-3">
                <label for="telefonoReferencia0">Teléfono  1</label>
                <input
                type="text"
                class="form-control requerido numerico"
                id="telefonoReferencia0"
                name="telefonoReferencia0" required>
                <span class="text-danger"></span>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="nombreReferencia1">Nombre  2</label>
                <input
                type="text"
                class="form-control requerido alfanumerico"
                id="nombreReferencia1"
                name="nombreReferencia1" required>
                <span class="text-danger"></span>
            </div>

            <div class="col-md-3">
                <label for="nombreReferencia1">Apellido  2</label>
                <input
                type="text"
                class="form-control requerido alfanumerico"
                id="apellidoReferencia1"
                name="apellidoReferencia1" required>
                <span class="text-danger"></span>
            </div>

            <div class="col-md-3">
                <label for="telefonoReferencia1">Teléfono  2</label>
                <input
                type="text"
                class="form-control requerido numerico"
                id="telefonoReferencia1"
                name="telefonoReferencia1" required>
                <span class="text-danger"></span>
            </div>

            <div class="col-md-3">
                <label for="parentescoReferencia1">Parentesco  1</label>
                <input
                type="text"
                class="form-control requerido alfanumerico"
                id="parentescoReferencia1"
                name="parentescoReferencia1"
                required>
                <span class="text-danger"></span>
            </div>
        </div>

    @endif

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Datos Laborales
            </h3>
        </div>

    </div>

    @if(isset($cliente))
        @foreach($cliente->empleo as $laboral)
            <div class="row">
                <div class="col-md-6">
                    <label for="nombre_empresa">Empresa</label>
                    <input
                    type="text"
                    class="form-control requerido"
                    id="nombre_empresa"
                    name="nombre_empresa"
                    value="{{ $laboral->nombre_empresa }}"
                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-md-6">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control requerido" id="cargo" name="cargo"
                    value="{{ $laboral->cargo }}"
                    required>
                    <span class="text-danger"></span>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <label for="telefonoEmpresa">Teléfono Empresa</label>
                    <input
                    type="text"
                    class="form-control requerido numerico"
                    id="telefonoEmpresa"
                    name="telefonoEmpresa"
                    value="{{ $laboral->telefono_empresa }}"
                    required>
                    <span class="text-danger"></span>
                </div>

                <div class="col-md-6">
                    <label for="direccionEmpresa">Dirección Empresa</label>
                    <input
                    type="text"
                    class="form-control requerido"
                    id="direccionEmpresa"
                    name="direccionEmpresa"
                    value="{{ $laboral->direccion_empresa }}"
                    required>
                    <span class="text-danger"></span>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-6">
                    <label for="fechaIngreso">Tiempo Laborando</label>
                    <input
                    type="text"
                    class="form-control requerido"
                    id="tiempo"
                    name="tiempo"
                    value="{{ $laboral->tiempo }}"
                    required>
                    <span class="text-danger"></span>

                </div>

                <div class="col-sm-6">
                    <label for="salario">Salario</label>
                    <input
                    type="text"
                    class="form-control requerido numerico"
                    id="salario"
                    name="salario"
                    value="{{ $laboral->salario }}"
                    required>
                    <span class="text-danger"></span>

                </div>
            </div>
        @endforeach

    @else

    <div class="row">
        <div class="col-md-6">
            <label for="empresa">Empresa</label>
            <input
            type="text"
            class="form-control requerido"
            id="nombre_empresa"
            name="nombre_empresa"
            required>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control requerido" id="cargo" name="cargo" required>
            <span class="text-danger"></span>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <label for="telefonoEmpresa">Teléfono Empresa</label>
            <input
            type="text"
            class="form-control requerido numerico"
            id="telefonoEmpresa"
            name="telefonoEmpresa" required>
            <span class="text-danger"></span>
        </div>

        <div class="col-md-6">
            <label for="direccionEmpresa">Dirección Empresa</label>
            <input
            type="text"
            class="form-control requerido"
            id="direccionEmpresa"
            name="direccionEmpresa" required>
            <span class="text-danger"></span>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-6">
            <label for="fechaIngreso">Tiempo  Laborando</label>
            <input
            type="text"
            class="form-control requerido"
            id="tiempo"
            name="tiempo" required>
            <span class="text-danger"></span>
        </div>

        <div class="col-sm-6">
            <label for="salario">Salario</label>
            <input
            type="text"
            class="form-control requerido numerico"
            id="salario"
            name="salario" required>
            <span class="text-danger"></span>
        </div>
    </div>

    @endif


    @if(isset($cliente))

        <button type="submit" class="btn btn-primary saveForm mt-4">Actualizar Cliente</button>

    @else

        <button type="submit" class="btn btn-primary saveForm mt-4">Crear Cliente</button>

    @endif


</form>