

<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-2">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <span class="sr-only">Action button</span>
                    Action
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nombre</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Estado</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tiempo en llamada</a>
                        </li>
                    </ul>
                    {{-- <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                    </div> --}}
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Agente</th>
                    <th scope="col" class="px-6 py-3">IP</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Tiempo en llamada</th>
                    <th scope="col" class="px-6 py-3">Administrar</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Luis Fernández</td>
                    <td class="px-6 py-4">192.168.1.23</td>
                    <td class="px-6 py-4 text-green-600 dark:text-green-400">En llamada</td>
                    <td class="px-6 py-4">00:14:32</td>
                    <td class="px-6 py-4"><button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Administrar    
                    </button></td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Daniela Rojas</td>
                    <td class="px-6 py-4">192.168.1.45</td>
                    <td class="px-6 py-4 text-yellow-600 dark:text-yellow-400">Pausado</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">-</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Carlos Mena</td>
                    <td class="px-6 py-4">10.0.0.18</td>
                    <td class="px-6 py-4 text-red-500">Desconectado</td>
                    <td class="px-6 py-4">-</td>
                    <td class="px-6 py-4">-</td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Mónica Salas</td>
                    <td class="px-6 py-4">172.17.8.102</td>
                    <td class="px-6 py-4 text-green-600 dark:text-green-400">Disponible</td>
                    <td class="px-6 py-4">00:03:17</td>
                    <td class="px-6 py-4">-</td>


                    
    
   
    
                </tr>
            </tbody>
        </table>
    </div>

    <div id="popup-modal" tabindex="-1" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-25">
          <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-4 shadow max-w-sm w-full">
                <!-- Componente individual de control de agente -->
                <div class="flex items-center gap-4 mb-4">
                     <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center text-white text-lg font-semibold">
                          👤
                     </div>
                     <div>
                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Juan Pérez</h3>
                          <p class="text-sm text-gray-600 dark:text-gray-400">192.168.1.50</p>
                     </div>
                     <div class="ml-auto text-right">
                          <p class="text-green-600 dark:text-green-400 text-sm font-semibold">En llamada</p>
                          <p class="text-xs text-gray-500 dark:text-gray-300">14:32</p>
                     </div>
                </div>

                <div class="flex gap-3 mb-4">
                     <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium">🎧 Escuchar llam.</button>
                     <button class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md text-sm font-medium">📞 Finalizar llam.</button>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                     <h4 class="text-sm font-semibold mb-2 text-gray-800 dark:text-gray-200">Acciones</h4>
                     <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300">
                          <span class="flex items-center gap-1"><span class="w-2 h-2 bg-green-500 rounded-full"></span>Despausar</span>
                          <span class="opacity-70 cursor-pointer">Mover a cola</span>
                     </div>
                </div>

                <div class="pt-4 text-sm text-indigo-600 dark:text-indigo-400 font-semibold cursor-pointer hover:underline">
                     Ver información
                </div>
          </div>
     </div>

</x-app-layout>