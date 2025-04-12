<x-app-layout>

    <div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen text-black dark:text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
            <!-- Agentes activos -->
            <div class="md:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold mb-4">👥 Agentes activos</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                        <thead class="text-xs uppercase bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Extensión</th>
                                <th class="px-4 py-2">Conectado</th>
                                <th class="px-4 py-2">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-300 dark:border-gray-600">
                                <td class="px-4 py-2">Juan Perez</td>
                                <td class="px-4 py-2">1001</td>
                                <td class="px-4 py-2">2h 13m</td>
                                <td class="px-4 py-2 text-green-600 dark:text-green-400">● Activo</td>
                            </tr>
                            <tr class="border-b border-gray-300 dark:border-gray-600">
                                <td class="px-4 py-2">Maria Gomez</td>
                                <td class="px-4 py-2">1002</td>
                                <td class="px-4 py-2">48 min</td>
                                <td class="px-4 py-2 text-green-600 dark:text-green-400">● Activo</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Carlos Ruiz</td>
                                <td class="px-4 py-2">1003</td>
                                <td class="px-4 py-2">Despausado</td>
                                <td class="px-4 py-2 text-gray-700 dark:text-gray-300">● Inactivo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-right mt-4">
                    <a  href="{{route('table.agents')}}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold py-2 px-4 rounded">Ver tabla completa</a>
                </div>
            </div>
    
            <!-- Resumen del día -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold mb-4">Resumen del día</h2>
                <ul class="space-y-2 text-sm">
                    <li><span class="inline-block w-5 h-5 text-center bg-blue-600 rounded-full text-white">12</span> agentes despausados</li>
                    <li><span class="inline-block w-5 h-5 text-center bg-indigo-600 rounded-full text-white">7</span> llamadas escuchadas</li>
                    <li><span class="inline-block w-5 h-5 text-center bg-orange-600 rounded-full text-white">3</span> cambios de cola</li>
                </ul>
            </div>
    
            <!-- Colas activas -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold mb-4">Operaciones activas</h2>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center gap-2"><span class="w-2 h-2 bg-green-500 rounded-full"></span> ventas_in (0)</li>
                    <li class="flex items-center gap-2"><span class="w-2 h-2 bg-red-500 rounded-full"></span> retencion (0)</li>
                </ul>
            </div>
    
            <!-- Acciones recientes -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold mb-4">Acciones recientes del supervisor</h2>
                <ul class="text-sm space-y-1 text-gray-700 dark:text-gray-300">
                    <li>ℹ️ Despausó al Agente 2039</li>
                    <li>ℹ️ Escuchó llamada de 2040</li>
                    <li>ℹ️ Cambió de cola a Agente 2041</li>
                </ul>
            </div>
    
            <!-- Usuarios -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700 text-sm">
                <h2 class="text-xl font-bold mb-4">Usuarios</h2>
                <p class="flex items-center gap-2">
                    <span class="text-gray-500 dark:text-gray-400">👥</span> Total: <span class="font-semibold text-black dark:text-white">42</span>
                </p>
                <p class="flex items-center gap-2">
                    <span class="text-gray-500 dark:text-gray-400">📅</span> Pausados: <span class="font-semibold text-yellow-600 dark:text-yellow-400">7</span>
                </p>
            </div>
    
            <!-- Notificaciones -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold mb-4">Notificaciones recientes</h2>
                <ul class="text-sm text-gray-700 dark:text-gray-300 list-disc list-inside space-y-1">
                    <li>Nueva cola agregada</li>
                    <li>Se detectó actividad no usual</li>
                    <li>Pausa larga detectada (> 30 min)</li>
                </ul>
            </div>
                    <!-- Despausar agentes con botón -->
            @hasrole(1,2)
              <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700 flex flex-col justify-between">
                  <div>
                      <h2 class="text-lg font-semibold mb-4">🟢 Despausar agentes</h2>
                      <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">Supervisa y gestiona los agentes que han sido despausados recientemente.</p>
                      <ul class="text-sm space-y-2 text-gray-700 dark:text-gray-300">
                          <li>Despausó a <strong>Daniela Rojas</strong></li>
                          <li>Despausó a <strong>Camilo Pérez</strong></li>
                          <li>Despausó a <strong>Andrés Silva</strong></li>
                      </ul>
                  </div>
                  <div class="mt-6 text-right">
                      <a href="/supervisor/despausar" class="bg-green-600 hover:bg-green-700 text-white font-medium text-sm py-2 px-4 rounded">Ir a despausar</a>
                  </div>
              </div>
      
              <!-- Agregar a colas con botón -->
              <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700 flex flex-col justify-between">
                  <div>
                      <h2 class="text-lg font-semibold mb-4">📥 Agregados a colas</h2>
                      <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">Consulta o agrega los agentes  a una cola.</p>
                      <ul class="text-sm space-y-2 text-gray-700 dark:text-gray-300">
                          <li><strong>Luis Fernández</strong> agregado a <span class="text-blue-500">ventas_in</span></li>
                          <li><strong>Daniela Rojas</strong> agregado a <span class="text-blue-500">retención</span></li>
                          <li><strong>Mónica Salas</strong> agregado a <span class="text-blue-500">moviles</span></li>
                      </ul>
                  </div>
                  <div class="mt-6 text-right">
                      <a href="/supervisor/colas" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm py-2 px-4 rounded">Gestionar colas</a>
                  </div>
              </div>
            @endhasrole



    
        </div>
      </div>

      





      
</x-app-layout>