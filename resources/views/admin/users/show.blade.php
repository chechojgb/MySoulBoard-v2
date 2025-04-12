<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8 bg-white text-black min-h-screen dark:bg-gray-800 dark:text-gray-200">
        <!-- Formulario de edición de usuario -->
        <div class="lg:col-span-2 bg-gray-100 p-6 rounded-xl shadow-md border border-gray-300 dark:bg-gray-700 dark:border-gray-600">
            <h2 class="text-2xl font-bold mb-6">👤 Editar Usuario</h2>

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Nombre</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full rounded-md bg-gray-100 border-gray-300 text-black dark:bg-gray-600 dark:border-gray-500 dark:text-gray-200" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Correo</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="w-full rounded-md bg-gray-100 border-gray-300 text-black dark:bg-gray-600 dark:border-gray-500 dark:text-gray-200" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Rol</label>
                        <select name="role" class="w-full rounded-md bg-gray-100 border-gray-300 text-black dark:bg-gray-600 dark:border-gray-500 dark:text-gray-200" required>
                            <option value="Supervisor" {{ $userRole === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                            <option value="Soporte" {{ $userRole === 'Soporte' ? 'selected' : '' }}>Soporte</option>
                        </select>
                    </div>

                    <div class="border-t pt-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Áreas del {{ $userRole }}</label>
                    
                        <div class="space-y-1 text-sm text-gray-600 dark:text-gray-300">
                            @foreach ($areas as $area)
                                <div class="flex items-center gap-2">
                                    <input
                                        type="checkbox"
                                        name="areas[]"
                                        value="{{ $area->id }}"
                                        id="area-{{ $area->id }}"
                                        {{ in_array($area->id, $user->areaRoles->pluck('area_id')->toArray()) ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-blue-600 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600"
                                    >
                                    <label for="area-{{ $area->id }}">{{ $area->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-sm text-black/70 mt-2 dark:text-gray-400">Mantén presionada la tecla Ctrl (Cmd en Mac) para seleccionar o deseleccionar múltiples áreas.</p>
                    </div>
                    
                    
                </div>

                <div class="mt-6 text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 font-semibold text-white rounded shadow dark:bg-blue-500 dark:hover:bg-blue-600">
                        Actualizar usuario
                    </button>
                </div>
            </form>
        </div>

        <!-- Info lateral -->
        <div class="space-y-6">
            <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-4 rounded-xl dark:from-blue-600 dark:to-purple-700">
                <h3 class="text-lg font-semibold">📌 Nota rápida</h3>
                <p class="text-sm text-black/80 dark:text-gray-300">Solo se permite cambiar entre los roles Soporte y Supervisor. Los administradores no se pueden editar desde aquí.</p>
            </div>

            <div class="bg-gray-100 p-4 rounded-xl border border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                <h3 class="text-lg font-semibold">👤 Información del usuario</h3>
                <ul class="text-sm text-black/70 list-disc list-inside mt-2 dark:text-gray-400">
                    <li><strong>Nombre:</strong> {{ $user->name }}</li>
                    <li><strong>Correo:</strong> {{ $user->email }}</li>
                    <li><strong>Rol actual:</strong> {{ $userRole }}</li>
                </ul>
            </div>

            <div class="bg-gray-100 p-4 rounded-xl border border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                <h3 class="text-lg font-semibold">👀 Áreas actuales</h3>
                <ul class="text-sm text-black/70 list-disc list-inside mt-2 dark:text-gray-400">
                    @foreach ($user->areaRoles as $rel)
                        <li>{{ $rel->area->name ?? 'Sin área' }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-gray-100 p-4 rounded-xl border border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                <h3 class="text-lg font-semibold">🔐 Seguridad</h3>
                <p class="text-sm text-black/70 dark:text-gray-400">Cambiar el rol de un usuario puede alterar su acceso a funcionalidades específicas del sistema.</p>
            </div>
        </div>
    </div>
</x-app-layout>
