<x-app-layout>



    <div x-data="agentPanel()" x-init="fetchStats(); fetchAgents()" class="mt-4 relative overflow-x-auto shadow-md sm:rounded-sm  ml-4">

        <x-breadcrumb :items="[
            ['label' => 'Tablas', 'url' => route('table.agents')],
            ['label' => 'Agentes']
        ]" />

        <div class="rounded-lg overflow-hidden shadow-sm">

            <!-- Encabezado con dropdown, contadores y buscador -->
            <div class=" flex flex-wrap items-center justify-between gap-6 px-4 pb-2 pt-2 bg-white dark:bg-gray-900 ">
    
                <!-- Zona izquierda: Dropdown de acciones -->
                <div class="flex-shrink-0">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Operaciones asignadas
                            <svg class="w-2.5 h-2.5 ml-2" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition class="absolute z-10 mt-2 bg-white dark:bg-gray-700 divide-y divide-gray-100 dark:divide-gray-600 rounded-lg shadow-sm w-44">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                @foreach ($user->areaRoles as $ar)
                                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $ar->area->name }}</a></li>
                                @endforeach
                                {{-- <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tiempo en llamada</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            
                <!-- Zona centro: Contadores -->
                <div class="flex-1 flex justify-center">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <!-- Tarjeta contador -->
                        <div class="text-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-2 shadow hover:scale-105 transition-all duration-200">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Llamadas en cola</p>
                            <p class="text-lg font-semibold text-indigo-600 dark:text-indigo-400" x-text="stats.queue"></p>
                        </div>
                        <div class="text-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-2 shadow hover:scale-105 transition-all duration-200">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Agentes disponibles</p>
                            <p class="text-lg font-semibold text-green-600 dark:text-green-400" x-text="stats.available"></p>
                        </div>
                        <div class="text-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-2 shadow hover:scale-105 transition-all duration-200">
                            <p class="text-xs text-gray-500 dark:text-gray-400">En llamada</p>
                            <p class="text-lg font-semibold text-blue-600 dark:text-blue-400" x-text="stats.onCall"></p>
                        </div>
                        <div class="text-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-2 shadow hover:scale-105 transition-all duration-200">
                            <p class="text-xs text-gray-500 dark:text-gray-400">Pausados</p>
                            <p class="text-lg font-semibold text-yellow-500" x-text="stats.paused"></p>
                        </div>
                    </div>
                </div>
            
                <!-- Zona derecha: Buscador -->
                <div class="flex-shrink-0">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input x-model="search" type="text" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-64 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Buscar agente...">
                    </div>
                </div>
            
            </div>
    
            <!-- Tabla de agentes -->
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Extension</th>
                        <th class="px-6 py-3">Agente</th>
                        <th class="px-6 py-3">IP</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Tiempo en llamada</th>
                        <th class="px-6 py-3">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="agent in agents.filter(a => a.name.toLowerCase().includes(search.toLowerCase()))" :key="agent.ip">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" x-text="agent.extension"></td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" x-text="agent.name"></td>
                            <td class="px-6 py-4" x-text="agent.ip"></td>
                            <td class="px-6 py-4" :class="{
                                    'text-green-600 dark:text-green-400': agent.status === 'Disponible' || agent.status === 'En llamada',
                                    'text-yellow-600 dark:text-yellow-400': agent.status === 'Pausado',
                                    'text-red-500': agent.status === 'Desconectado'
                                }" x-text="agent.status"></td>
                            <td class="px-6 py-4" x-text="agent.time"></td>
                            <td class="px-6 py-4">
                                <button @click="openModal(agent)" 
                                    class="block text-gray-700 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center transition-colors duration-200">
                                    Administrar
                                </button>
    
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div x-show="modalOpen" @keydown.escape.window="closeModal()" @click.outside="closeModal()" x-transition
            class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-25">
            <div class="bg-white dark:bg-gray-800 border rounded-xl p-4 shadow max-w-sm w-full">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center text-white text-lg font-semibold">
                        👤
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white" x-text="getActiveAgent().name"></h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400" x-text="getActiveAgent().ip"></p>
                    </div>
                    <div class="ml-auto text-right">
                        <p class="text-green-600 dark:text-green-400 text-sm font-semibold" x-text="getActiveAgent().status"></p>
                        <p class="text-xs text-gray-500 dark:text-gray-300" x-text="getActiveAgent().time"></p>
                    </div>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <h4 class="text-sm font-semibold mb-2 text-gray-800 dark:text-gray-200">Acciones que puedes realizar</h4>
                    <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300">
                        <span class="flex items-center gap-1"><span class="w-2 h-2 bg-green-500 rounded-full"></span>Despausar</span>
                        <span class="opacity-70 cursor-pointer">Mover a cola</span>
                    </div>
                    <div class="flex gap-3 mb-4 pt-4">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm font-medium">🎧 Escuchar llam.</button>
                        <button class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md text-sm font-medium">📞 Finalizar llam.</button>
                    </div>
                </div>

                <div @click="closeModal()" class="pt-4 text-sm text-indigo-600 dark:text-indigo-400 font-semibold cursor-pointer hover:underline">
                    Realizar control
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js logic -->
    <script>
        function agentPanel() {
            return {
                modalOpen: false,
                activeAgentIp: null,
                search: '',
                stats: { queue: 0, available: 0, onCall: 0, paused: 0 },
                agents: [],
                fetchAgents() {
                    fetch('/api/agents/movil')
                        .then(res => res.json())
                        .then(data => {
                            console.log(
                            '%c Datos actualizados de Agentes:',
                            'color: #0ea5e9; font-weight: bold;',
                            data
                            );
                            this.agents = data;
                            setTimeout(() => this.fetchAgents(), 5000);
                        })
                        .catch(err => {
                            console.error('❌ Error al obtener agentes:', err);
                            setTimeout(() => this.fetchAgents(), 5000);
                        });
                },
                fetchStats() {
                    fetch('/api/stats/movil')
                        .then(res => res.json())
                        .then(data => {
                            console.log('[STATS] Contadores actualizados:', data);
                            this.stats = data;
                            setTimeout(() => this.fetchStats(), 5000);
                        })
                        .catch(err => {
                            console.error('❌ Error al obtener stats:', err);
                            setTimeout(() => this.fetchStats(), 5000);
                        });
                },
                openModal(agent) {
                    this.activeAgentIp = agent.ip;
                    this.modalOpen = true;
                    console.log('[MODAL] Abierto para:', agent);
                },
                closeModal() {
                    this.modalOpen = false;
                },
                getActiveAgent() {
                    return this.agents.find(a => a.ip === this.activeAgentIp) || {};
                }
            }
        }
    </script>
    
    
</x-app-layout>
