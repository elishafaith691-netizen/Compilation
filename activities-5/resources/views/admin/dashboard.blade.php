<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 leading-tight tracking-tight">
                    {{ __('System Administration') }}
                </h2>
                <p class="text-xs text-slate-500 font-medium mt-1 uppercase tracking-widest">Management Overview & Security</p>
            </div>
            <div class="flex items-center space-x-2 bg-white px-4 py-2 rounded-full border border-slate-200 shadow-sm">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-xs font-bold text-slate-600 uppercase tracking-tighter">System: Operational</span>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Statistical Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">User Database</p>
                            <p class="text-4xl font-black text-slate-900 mt-1">{{ count($internalUsers ?? []) }}</p>
                        </div>
                        <div class="p-4 bg-indigo-50 text-indigo-600 rounded-2xl">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Global Events</p>
                            <p class="text-4xl font-black text-slate-900 mt-1">{{ count($externalPosts ?? []) }}</p>
                        </div>
                        <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 4v4h4"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Security Clearance</p>
                            <p class="text-xl font-black text-rose-600 mt-2">Level 4 Admin</p>
                        </div>
                        <div class="p-4 bg-rose-50 text-rose-600 rounded-2xl">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Column: Admin Profile & Actions -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="bg-slate-900 px-6 py-5">
                            <h3 class="text-sm font-bold text-white uppercase tracking-widest">Active Operator</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-col items-center mb-6">
                                <div class="w-24 h-24 bg-gradient-to-tr from-indigo-600 to-blue-400 rounded-3xl flex items-center justify-center mb-4 shadow-lg rotate-3">
                                    <span class="text-3xl font-black text-white -rotate-3">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                                </div>
                                <h4 class="text-xl font-extrabold text-slate-900">{{ auth()->user()->full_name ?? 'Operator' }}</h4>
                                <span class="px-3 py-1 bg-rose-50 text-rose-600 rounded-full text-[10px] font-black uppercase tracking-tighter mt-2 border border-rose-100">Root Access</span>
                            </div>
                            <div class="space-y-4 text-sm border-t border-slate-100 pt-6">
                                <div class="flex justify-between">
                                    <span class="text-slate-400 font-bold uppercase text-[10px]">Credential</span>
                                    <span class="text-slate-700 font-bold tracking-tight">{{ auth()->user()->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400 font-bold uppercase text-[10px]">Node</span>
                                    <span class="text-slate-700 font-bold tracking-tight">{{ auth()->user()->email }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400 font-bold uppercase text-[10px]">Session Start</span>
                                    <span class="text-slate-700 font-bold tracking-tight">{{ now()->format('H:i:s') }}</span>
                                </div>
                            </div>
                            <div class="mt-8">
                                <a href="{{ route('profile.edit') }}" class="block w-full text-center px-4 py-3 bg-slate-50 border border-slate-200 text-slate-700 rounded-xl hover:bg-slate-100 transition-all font-bold text-xs uppercase tracking-widest">
                                    System Settings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: System Data Management -->
                <div class="lg:col-span-8 space-y-8">
                    <!-- Internal User Management -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Operator Registry</h3>
                            <div class="flex items-center space-x-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                <span class="text-[10px] font-black text-slate-400 uppercase">Live Sync</span>
                            </div>
                        </div>
                        <div class="p-0">
                            <table class="min-w-full">
                                <thead class="bg-slate-50/50 border-b border-slate-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Identified Subject</th>
                                        <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Authority Level</th>
                                        <th class="px-6 py-4 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Terminal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    @foreach(($internalUsers ?? []) as $u)
                                        <tr class="hover:bg-slate-50/80 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="h-9 w-9 rounded-xl bg-slate-100 flex items-center justify-center text-xs font-black text-slate-500 mr-4 border border-slate-200">
                                                        {{ strtoupper(substr($u->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-extrabold text-slate-900 tracking-tight">{{ $u->full_name }}</div>
                                                        <div class="text-[11px] text-slate-400 font-medium">{{ $u->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2.5 py-1 {{ $u->role === 'admin' ? 'bg-rose-50 text-rose-600 border-rose-100' : 'bg-emerald-50 text-emerald-600 border-emerald-100' }} border rounded-md text-[9px] font-black uppercase tracking-tighter">
                                                    {{ $u->role }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="px-4 py-1.5 bg-white border border-slate-200 text-slate-600 rounded-lg hover:border-slate-300 hover:text-slate-900 transition-all font-bold text-[11px] uppercase shadow-sm">Audit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- External Data Integration -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Data Stream Integration</h3>
                            <a href="{{ route('external.data') }}" class="text-[11px] bg-indigo-50 text-indigo-700 px-3 py-1.5 rounded-lg hover:bg-indigo-100 transition-colors font-black uppercase tracking-tighter flex items-center">
                                Full Diagnostics
                                <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @forelse(($externalPosts ?? []) as $post)
                                    <div class="group p-5 bg-slate-50/50 rounded-2xl border border-slate-100 hover:border-indigo-200 hover:bg-white transition-all hover:shadow-lg hover:shadow-indigo-500/5 cursor-default">
                                        <div class="flex items-start">
                                            <div class="bg-white text-indigo-500 p-2.5 rounded-xl mr-4 shadow-sm group-hover:bg-indigo-600 group-hover:text-white transition-colors border border-slate-100">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-black text-xs text-slate-900 uppercase tracking-tight group-hover:text-indigo-600 transition-colors truncate">{{ $post['title'] }}</h4>
                                                <p class="text-[11px] text-slate-500 mt-1.5 line-clamp-2 leading-relaxed font-medium">{{ $post['body'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="flex flex-col items-center justify-center py-8 text-gray-400 bg-gray-50 rounded-xl border border-dashed">
                                        <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        <p class="text-sm font-medium italic">Integration feed temporarily offline</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
