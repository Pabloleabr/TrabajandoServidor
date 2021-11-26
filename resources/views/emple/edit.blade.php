<x-layout>

    <form action="{{ route('emple.update', [], false) }}" method="POST">
        @method('PUT')
        <x-emple.form
            :nombre="$emple->nombre"
            :fechaAlt="$emple->fecha_alt"
            :salario="$emple->salario"
            :departId="$emple->depart_id"
            :departamentos="$departamentos"/>
    </form>


</x-layout>
