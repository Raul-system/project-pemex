{{-- El Nombre del departamento me sirve para saber quien lo rechazo
    Los Controles de Opciones tipo checkbox, son para generarlos de forma dinamica
    Recibo 3 cosas para el checkbox:
    - Texto
    -Name
    -value

    El modelo de la tabla, me sirve para poder obtener el id del postulado en cierto departamento
    y asi poder enviarlo como referencia importante a la hora de hacer el proceso
    --}}
<section class="container-fluid bg-light py-4">
    <form action="{{ route('rechazados.store') }}" method="POST">
        @csrf
        
        <input type="hidden" name="id_postulado" value="{{ $informacion }}">
        {{-- Mandamos informacion extra como hasta el nombre del departamento --}}
        <input type="hidden" name="departamento" value="{{ $departamento }}">

        @foreach ($controls as $item)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $item['Name'] }}" value="{{ $item['Razon'] }}" id="{{ $item['Name'] }}">
                <label class="form-check-label" for="{{ $item['Name'] }}">
                    {{ $item['Texto'] }}
                </label>
            </div>
        @endforeach
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="motivos_check" id="other_motivos">
                <label class="form-check-label" for="other_motivos">
                    Por Otros Motivos
                </label>
            </div>
            <div class="form-group" title="Escribe por otros motivos">
                <input type="text" id="box_otros_motivos" name="otros_motivos" placeholder="Motivo ..." class="form-control" disabled>
            </div>  
        <section class="container py-5 d-flex justify-content-center">
            <input type="submit"  value="No Procedio" class="btn btn-danger text-white font-weight-bold btn-md">
        </section>

    </form>
</section>
    <script type="text/javascript">
    const checkBox = document.getElementById('other_motivos'), boxOtherMotivos = document.getElementById('box_otros_motivos');
    
        checkBox.addEventListener('change', function(){
            (checkBox.checked) ? boxOtherMotivos.removeAttribute('disabled') : boxOtherMotivos.setAttribute('disabled','disabled');
            (!checkBox.checked) ? boxOtherMotivos.value='' : null
        });
    </script>
