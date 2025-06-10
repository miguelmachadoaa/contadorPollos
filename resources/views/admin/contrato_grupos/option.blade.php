
                          @foreach($contratosGrupos as $ct)

                            <option @if($ct->id == $grupo->id) Selected @endif value="{{$ct->id}}">{{$ct->nombre}}  - Contratos {{count($ct->contratos)}}</option>
                          
                          @endforeach
                         
                      