<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Global External Data Feed') }}
            </h2>
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-blue-400" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3" />
                    </svg>
                    Live API Connection
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-900">Latest Bulletins from JSONPlaceholder</h3>
                <p class="mt-2 text-sm text-gray-600">This data is fetched in real-time from a public REST API integration. It demonstrates the system's ability to consume and process external JSON data structures.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($posts as $post)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <div class="p-6 flex-1">
                            <div class="flex items-center mb-4">
                                <span class="bg-indigo-100 text-indigo-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">Bulletin #{{ $post['id'] }}</span>
                            </div>
                            <h4 class="text-lg font-bold text-gray-900 mb-3 leading-snug">{{ $post['title'] }}</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $post['body'] }}</p>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-50 flex justify-between items-center">
                            <span class="text-xs text-gray-400 italic">External Source</span>
                            <button class="text-xs font-bold text-indigo-600 hover:text-indigo-800">Read Full Analysis</button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-white rounded-2xl p-12 text-center border-2 border-dashed border-gray-200">
                            <div class="mx-auto h-16 w-16 text-gray-400 mb-4">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">External Integration Offline</h3>
                            <p class="text-gray-500 mt-2">The system encountered an SSL or connection error while attempting to synchronize with the public API.</p>
                            <div class="mt-6">
                                <a href="{{ url()->current() }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                    Retry Connection
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 p-6 bg-indigo-50 rounded-2xl border border-indigo-100">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-bold text-indigo-800">Integration Architecture Note</h3>
                        <div class="mt-2 text-sm text-indigo-700">
                            <p>This page consumes data via Laravel's HTTP Client from the JSONPlaceholder mock server. In a production environment, this would be replaced with real-world student data or institutional feeds.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
