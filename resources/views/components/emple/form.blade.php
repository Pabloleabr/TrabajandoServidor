@csrf
<div class="mb-6">
    <label for="nombre"
        class="text-sm font-medium text-gray-900 block mb-2 @error('nombre') text-red-500 @enderror">
        Nombre
    </label>
    <input type="text" name="nombre" id="nombre"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nombre') border-red-500 @enderror"
        value="{{ old('nombre', $nombre) }}">
    @error('nombre')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="fechaAlt"
        class="text-sm font-medium text-gray-900 block mb-2 @error('fechaAlt') text-red-500 @enderror">
        fechaAlt
    </label>
    <input type="text" name="fechaAlt" id="fechaAlt"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('fechaAlt') border-red-500 @enderror"
        value="{{ old('fechaAlt', $fechaAlt) }}">
    @error('fechaAlt')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="salario"
        class="text-sm font-medium text-gray-900 block mb-2 @error('salario') text-red-500 @enderror">
        salario
    </label>
    <input type="text" name="salario" id="salario"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('salario') border-red-500 @enderror"
        value="{{ old('salario', $salario) }}">
    @error('salario')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<div class="mb-6">
    <label for="departId"
        class="text-sm font-medium text-gray-900 block mb-2 @error('departId') text-red-500 @enderror">
        departamento
    </label>
    <input type="text" name="departId" id="departId"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('departamento') border-red-500 @enderror"
        value="{{ old('departId', $departId) }}">
    @error('departId')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
<a href="/depart"
    class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
