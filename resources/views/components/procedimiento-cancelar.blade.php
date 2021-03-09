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
    <form action="{{ route('cancelarDocumentos') }}" method="POST">
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

        <section class="container py-5 d-flex justify-content-center">
            <input type="submit"  value="No Procedio" class="btn btn-danger text-white font-weight-bold btn-md">
        </section>

    </form>
</section>