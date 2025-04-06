<x-app-layout>
    <main class="pt-2 pl-16 transition-all duration-300" :class="sidebarOpen ? 'pl-72 pr-12' : 'pl-20 pr-10'">
      <!-- Asegúrate de que <html class="dark"> esté definido para activar modo oscuro -->
      <div class="grid grid-cols-5 grid-rows-5 gap-4 p-4 min-h-screen bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white">

        <!-- 1 - Resumen general -->
        <div class="col-span-3 row-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-xl font-semibold mb-2">Resumen general</h2>
          <p class="text-sm text-gray-600 dark:text-gray-300">Indicadores principales, estadísticas y resumen del día.</p>
        </div>

        <!-- 2 - Alertas -->
        <div class="col-span-2 row-span-1 col-start-4 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-2">Alertas</h2>
          <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-300">
            <li>3 usuarios sin actividad</li>
            <li>2 tareas vencidas</li>
          </ul>
        </div>

        <!-- 8 - Mensajes recientes -->
        <div class="col-span-2 row-span-1 col-start-4 row-start-2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-2">Mensajes recientes</h2>
          <p class="text-sm text-gray-600 dark:text-gray-300">Consulta los mensajes o notificaciones importantes.</p>
        </div>

        <!-- 5 - Actividad -->
        <div class="col-span-2 row-span-2 row-start-3 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-2">Actividad</h2>
          <p class="text-sm text-gray-600 dark:text-gray-300">Registros recientes del sistema o usuarios.</p>
        </div>

        <!-- 9 - Proyectos -->
        <div class="col-span-2 row-span-2 row-start-3 col-start-3 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-2">Proyectos</h2>
          <p class="text-sm text-gray-600 dark:text-gray-300">Lista de proyectos activos y en progreso.</p>
        </div>

        <!-- 10 - Usuarios -->
        <div class="col-span-1 row-span-2 row-start-3 col-start-5 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-2">Usuarios</h2>
          <p class="text-sm text-gray-600 dark:text-gray-300">
            Total: <span class="font-semibold text-gray-900 dark:text-white">42</span><br>
            Activos: <span class="font-semibold text-gray-900 dark:text-white">35</span>
          </p>
        </div>

      </div>

      
    </main>





      
</x-app-layout>