<x-app-layout>
    <div class="p-8 dark:bg-gray-900 bg-gray-100 min-h-screen">
        @if (session('success'))
        <section class="pb-4">
            <x-alert-success>{{ session('success') }}</x-alert-success>
        </section>
        @endif
        <!-- Encabezado Hero -->
        <div class="flex items-center justify-between bg-gradient-to-r from-blue-700 to-indigo-900 p-6 rounded-xl shadow mb-10 text-white">
          <div>
            <h2 class="text-2xl font-bold">Gestión de Usuarios</h2>
            <p class="text-sm opacity-90">Crea los usuarios del sistema desde aquí.</p>
          </div>
          <img src="https://www.svgrepo.com/show/427485/user-add.svg" alt="User" class="w-20 h-20 hidden md:block">
        </div>
      
        <!-- Contenedor principal -->
        <div class="flex flex-col md:flex-row gap-8">
          <!-- Formulario -->
          <div class="w-full md:w-2/3 bg-white dark:bg-gray-800 p-6 rounded-xl shadow border dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Registro de Usuario</h3>
      
            <form x-data="{ tipoUsuario: '' }" class="space-y-4" method="POST" action="{{ route('users.store') }}">
                @csrf
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de usuario</label>
                <input type="text" class="mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="name" required id="name" value="{{ old('name') }}">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>
      
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                <input type="email" class="mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="email" required id="email" value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                <input type="password" class="mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="password" required id="password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar contraseña</label>
                <input type="password" class="mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="password_confirmation" required id="password_confirmation">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>
      
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de usuario</label>
                <select x-model="tipoUsuario" class="mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" name="role" required>
                  <option value="">Seleccione un tipo</option>
                  @foreach ($roles as $role)
                    <option  value="{{ $role->name }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
      
              <!-- Condicional con Alpine -->
              <div x-show="tipoUsuario === 'Supervisor'" class="border-t pt-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Áreas del supervisor</label>
                <div class="space-y-1 text-sm text-gray-600 dark:text-gray-300">
                    @foreach ($areas as $area)
                      <div><input type="checkbox" name="areas[]" value="{{ $area->name }}" id="{{ $area->name }}"> <label for="{{ $area->name }}">{{ $area->name }}</label></div>
                    @endforeach
                </div>
              </div>
      
              <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">Guardar usuario</button>
              </div>
            </form>
          </div>
      
          <!-- Panel lateral -->
          <div class="w-full md:w-1/3 space-y-4">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border dark:border-gray-700">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">👥 Tipos de usuario</h3>
              <p class="text-sm text-gray-600 dark:text-gray-300">
                Los usuarios pueden ser administradores, soporte o supervisores. Cada tipo tiene distintos permisos.
              </p>
            </div>
      
            <div class="bg-gradient-to-br from-blue-600 to-purple-700 text-white p-4 rounded-lg shadow">
              <h3 class="text-lg font-bold">📌 Consejo</h3>
              <p class="text-sm opacity-90">Recuerda asignar correctamente el tipo de usuario para evitar errores en el sistema.</p>
            </div>
      
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border dark:border-gray-700">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📊 Estadísticas</h3>
              <ul class="text-sm text-gray-600 dark:text-gray-300 list-disc list-inside">
                <li>42 usuarios registrados</li>
                <li>10 supervisores activos</li>
                <li>Último ingreso: hace 2h</li>
              </ul>
            </div>
          </div>
        </div>
      
        <!-- Sección de widgets decorativos debajo -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
          <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">Usuarios activos</p>
            <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">35</p>
          </div>
          <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">Supervisores</p>
            <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">10</p>
          </div>
          <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">Tareas pendientes</p>
            <p class="text-2xl font-bold text-red-600 dark:text-red-400">7</p>
          </div>
        </div>
      </div>
      
    
      
    

</x-app-layout>    