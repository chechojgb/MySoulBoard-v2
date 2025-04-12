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
            <h2 class="text-3xl font-bold flex items-center gap-2">
                
                Gestión de Áreas
            </h2>
            <p class="text-sm opacity-90 mt-1">Crea y administra las áreas del sistema según su funcionalidad.</p>
        </div>
        <img src="https://www.svgrepo.com/show/427485/user-add.svg" alt="User" class="w-20 h-20 hidden md:block">
    </div>

      <!-- Contenedor principal -->
      <div class="flex flex-col md:flex-row gap-8">
          <!-- Formulario -->
          <div class="w-full md:w-2/3 bg-white dark:bg-gray-800 p-6 rounded-xl shadow border dark:border-gray-700">
              <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                  Registro de Área
              </h3>

              <form class="space-y-4" method="POST" action="{{ route('areas.store') }}">
                  @csrf
                  <div>
                      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre del Área</label>
                      <input type="text" name="name" id="name" required value="{{ old('name') }}"
                             class="mt-1 w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-blue-500 focus:border-blue-500">
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  </div>

                  <div class="pt-2">
                      <button type="submit"
                              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                           Guardar Área
                      </button>
                  </div>
              </form>
          </div>

          <!-- Panel lateral informativo -->
          <div class="w-full md:w-1/3 space-y-4">
              <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border dark:border-gray-700">
                  <h3 class="text-lg font-semibold text-gray-800 dark:text-white">📂 ¿Qué es un área?</h3>
                  <p class="text-sm text-gray-600 dark:text-gray-300">
                      Un área representa una división funcional dentro del sistema, como <span class="font-semibold">Soporte</span>, <span class="font-semibold">Trámites</span>, <span class="font-semibold">Retención</span>, etc. Puedes asignar roles de usuario por área.
                  </p>
              </div>

              <div class="bg-gradient-to-br from-blue-600 to-purple-700 text-white p-4 rounded-lg shadow">
                  <h3 class="text-lg font-bold">📌 Consejo de uso</h3>
                  <p class="text-sm opacity-90">
                      Puedes asignar a un usuario diferentes roles en distintas áreas. Por ejemplo, puede ser <strong>Supervisor</strong> en Trámites y <strong>Soporte</strong> en Contención.
                  </p>
              </div>

              <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow border dark:border-gray-700">
                  <h3 class="text-lg font-semibold text-gray-800 dark:text-white">🛠️ Áreas en el sistema</h3>
                  <ul class="text-sm text-gray-600 dark:text-gray-300 list-disc list-inside">
                      <li>Soporte técnico</li>
                      <li>Trámites y atención</li>
                      <li>Movilidad y logística</li>
                      <li>Retención de clientes</li>
                      <li>Contención emocional</li>
                      <li>Grupo 4 / Casos especiales</li>
                  </ul>
              </div>
          </div>
      </div>

      <!-- Widgets decorativos -->
      <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
          <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow text-center">
              <p class="text-sm text-gray-500 dark:text-gray-400">Áreas registradas</p>
              <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $totalAreas ?? '6' }}</p>
          </div>
          <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow text-center">
              <p class="text-sm text-gray-500 dark:text-gray-400">Áreas con roles asignados</p>
              <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $areasConRoles ?? '5' }}</p>
          </div>
          <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow text-center">
              <p class="text-sm text-gray-500 dark:text-gray-400">Áreas inactivas</p>
              <p class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $areasInactivas ?? '1' }}</p>
          </div>
      </div>

  </div>
</x-app-layout>
