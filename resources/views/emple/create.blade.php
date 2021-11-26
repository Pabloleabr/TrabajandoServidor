<x-layout>

        <form action="{{ route('emple.store', [], false) }}" method="POST">
            <x-emple.form
                :nombre="''"
                :fechaAlt="''"
                :salario="''"
                :departId="''"
                :departamentos="$departamentos"/>
        </form>


</x-layout>
