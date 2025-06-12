@csrf

<div class="mb-4">
    <label for="nombre" class="block font-semibold">Nombre del Tag</label>
    <input type="text" name="nombre" id="nombre"
           value="{{ old('nombre', $tag->nombre ?? '') }}"
           class="w-full border rounded px-3 py-2"
           required>
</div>

<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    {{ $buttonText }}
</button>
