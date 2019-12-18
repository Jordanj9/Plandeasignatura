@extends('layouts.app')
@section('style')
    <style>
        table {
           width: 100%;
           margin-top: 20px;
        }

        table,td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td{
            width: 80px;
        }

        #label-button {
            color: white;
            position: absolute;
            height: 20px;
            width: 20px;
            top: 3px;
            right: -5px;
            border-radius: 50%;
            border: 1px solid #38A970;
            background-color: #38A970;
        }
    </style>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            @foreach($items as $item)
                <a href="" style="margin-right: 10px;" id="item-{{$item['id']}}" data-horas="{{$item['horas']}}" onclick="selectItem(event,'{{$item['id']}}')">
                    <button class="btn btn-outline-success btn-round button" >
                        <label for="" id="label-button">{{$item['horas']}}</label>
                        {{$item['descripcion']}}
                        <div class="ripple-container"></div>
                    </button>
                </a>
            @endforeach
        </div>
        <div class="col-md-12">
            <table>
                <thead>
                    <tr style="background-color: #38A970; color: white;">
                        <td>HORAS</td>
                        <td>LUNES</td>
                        <td>MARTES</td>
                        <td>MIERCOLES</td>
                        <td>JUEVES</td>
                        <td>VIERNES</td>
                        <td>SABADOS</td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>06:00-07:00</td>
                    <td data-dia="lunes" data-hora="6" id="11" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="6" id="12" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="6" id="13" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="6" id="14" onclick="addHorario(event)"></td>
                    <td data-dia="viernes" data-hora="6" id="15" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="6" id="16" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>07:00-08:00</td>
                    <td data-dia="lunes" data-hora="7" id="21" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="7" id="22" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="7" id="23" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="7" id="24" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="7" id="25" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="7" id="26" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>08:00-09:00</td>
                    <td data-dia="lunes" data-hora="8" id="31" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="8" id="32" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="8" id="33" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="8" id="34" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="8" id="35" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="8" id="36" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>09:00-10:00</td>
                    <td data-dia="lunes" data-hora="9" id="41" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="9" id="42" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="9" id="43" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="9" id="44" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="9" id="45" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="9" id="46" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>10:00-11:00</td>
                    <td data-dia="lunes" data-hora="10" id="51" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="10" id="52" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="10" id="53" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="10" id="54" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="10" id="55" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="10" id="56" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>11:00-12:00</td>
                    <td data-dia="lunes" data-hora="11" id="61" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="11" id="62" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="11" id="63" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="11" id="64" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="11" id="65" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="11" id="66" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>12:00-13:00</td>
                    <td data-dia="lunes" data-hora="12" id="71" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="12" id="72" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="12" id="73" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="12" id="74" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="12" id="75" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="12" id="76" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>13:00-14:00</td>
                    <td data-dia="lunes" data-hora="13" id="81" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="13" id="82" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="13" id="83" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="13" id="84" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="13" id="85" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="13" id="86" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>14:00-15:00</td>
                    <td data-dia="lunes" data-hora="14" id="91" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="14" id="92" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="14" id="93" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="14" id="94" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="14" id="95" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="14" id="96" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>15:00-16:00</td>
                    <td data-dia="lunes" data-hora="15" id="101" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="15" id="102" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="15" id="103" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="15" id="104" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="15" id="105" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="15" id="106" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>16:00-17:00</td>
                    <td data-dia="lunes" data-hora="16" id="111" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="16" id="112" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="16" id="113" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="16" id="114" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="16" id="115" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="16" id="116" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>17:00-18:00</td>
                    <td data-dia="lunes" data-hora="17" id="121" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="17" id="122" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="17" id="123" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="17" id="124" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="17" id="125" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="17" id="126" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>18:00-19:00</td>
                    <td data-dia="lunes" data-hora="18" id="131" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="18" id="132" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="18" id="133" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="18" id="134" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="18" id="135" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="18" id="136" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>19:00-20:00</td>
                    <td data-dia="lunes" data-hora="19" id="141" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="19" id="142" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="19" id="143" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="19" id="144" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="19" id="145" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="19" id="146" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>20:00-21:00</td>
                    <td data-dia="lunes" data-hora="20" id="151" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="20" id="152" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="20" id="153" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="20" id="154" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="20" id="155" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="20" id="156" onclick="addHorario(event)"></td>
                </tr>
                <tr>
                    <td>21:00-22:00</td>
                    <td data-dia="lunes" data-hora="20" id="161" onclick="addHorario(event)"></td>
                    <td data-dia="martes" data-hora="20" id="162" onclick="addHorario(event)"></td>
                    <td data-dia="miercoles" data-hora="20" id="163" onclick="addHorario(event)"></td>
                    <td data-dia="jueves" data-hora="20" id="164" onclick="addHorario(event)"></td>
                    <td odata-dia="viernes" data-hora="20" id="165" onclick="addHorario(event)"></td>
                    <td data-dia="sabado" data-hora="20" id="166" onclick="addHorario(event)"></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row-justify" style="margin-top: 20px;">
            <div class="col-md-12">
                <a href="" style="margin-right: 10px;" id="" onclick="guardar(event)">
                    <button class="btn btn-outline-success btn-round button" >
                        Guardar Plan de Trabajo
                        <div class="ripple-container"></div>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade modal-mini modal-primary" id="addHorario" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('unity.store')}}">
                            @csrf
                            <input type="hidden" id="td" value="">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Etiqueta</label>
                                                <input type="text" min="1" max="15" class="form-control"
                                                       placeholder="Etiqueta" id="etiqueta"
                                                       name="etiqueta" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line" id="select" style="display: none">
                                                <label class="control-label">Asignatura</label>
                                                <select class="select2"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required"
                                                        id="asignatura">
                                                    <option value="">--Seleccione una opción--</option>
                                                    @foreach($asignaturas as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-info btn-round" type="reset">Limpiar Formulario</button>
                                <button class="btn btn-success btn-round" type="submit" onclick="guardar_etiqueta(event)">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var item_selected;
        var horarios = [];

        function selectItem(event,id){
           event.preventDefault();
            item_selected =  id;
            if(item_selected != 13){
                let select =  document.getElementById('select');
                select.style.display = 'none';
            }
           let buttons = document.querySelectorAll('.button');
           buttons.forEach(function(item){
               item.removeAttribute('disabled')
           });
           event.target.setAttribute('disabled',true);
        }

        function addHorario(event){

            $('#td').val(event.target.getAttribute('id'));

            if(event.target.innerText != ''){

                let item = '#item-'+item_selected+' #label-button';
                item = document.querySelector(item);
                let count = parseInt(item.innerHTML)+1;
                item.innerHTML = count;

                horarios = horarios.filter( function( e ) {
                    return e.dia !== event.target.getAttribute('data-dia') && e.hora !== event.target.getAttribute('data-hora');
                });

                event.target.innerText = '';
                return;

            }else{

                if(item_selected == null){

                    $.notify({
                        icon: "add_alert",
                        message: 'Por favor selecione una activiadad para poder seguir con el registro.'
                    }, {type: 'warning', timer: 3e3, placement: {from: 'top', align: 'right'}});

                    return;
                }

                if(item_selected == 13){
                   let select =  document.getElementById('select');
                   select.style.display = 'block';
                }

                $('#addHorario').modal('show');
            }

        }

        function guardar_etiqueta(event){
            event.preventDefault();
            let item = '#item-'+item_selected+' #label-button';
            item = document.querySelector(item);
            let count = item.innerHTML-1;
            item.innerHTML = count;
            if(count != -1){
                $('#addHorario').modal('hide');
                let etiqueta = document.getElementById('etiqueta').value;
                let td = document.getElementById('td');
                let data = document.getElementById(td.value);
                document.getElementById(td.value).innerText = etiqueta;
                horarios.push({
                    'dia' : data.getAttribute('data-dia'),
                    'hora': data.getAttribute('data-hora'),
                    'etiqueta' : data.getAttribute('data-hora'),
                    'asignatura': $('#asignatura').val(),
                    'actividaddocente_id' : item_selected,
                    'plandetrabajo_id' : '{{$plan->id}}'
                });
            }else{
                item.innerHTML = 0;
                $.notify({
                    icon: "add_alert",
                    message: 'no hay horas disponible para esta actividad.'
                }, {type: 'warning', timer: 3e3, placement: {from: 'top', align: 'right'}});
            }
        }

        function guardar(event){
            event.preventDefault();
            axios.post('{{url('plan/plandetrabajo/actividades/horario/guardar')}}',{
                data: horarios
            }).then(response => {
                if(response.status == 'ok'){
                    $.notify({
                        icon: "add_alert",
                        message: 'El Horario del plan de trabajo se guardo correctamente.'
                    }, {type: 'success', timer: 3e3, placement: {from: 'top', align: 'right'}});
                }
            });
        }

    </script>
@endsection
