<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Student Information Dashboard') }}
            </h2>
            <div class="text-sm text-gray-500">
                Welcome back, <span class="font-bold text-indigo-600">{{ $user->name }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Section -->
            <div class="bg-indigo-700 rounded-2xl p-8 text-white shadow-lg overflow-hidden relative">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold mb-2">Hello, {{ $user->full_name }}!</h3>
                    <p class="text-indigo-100 max-w-xl">You are currently logged into the Integrated Information System. Here you can manage your profile and view data from both our internal directory and external academic feeds.</p>
                </div>
                <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-10 translate-y-10">
                    <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: User Profile -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-50 bg-gray-50">
                            <h3 class="font-bold text-gray-800">My Profile Identity</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase">Full Legal Name</label>
                                    <p class="text-gray-900 font-semibold">{{ $user->full_name }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase">Institutional Email</label>
                                    <p class="text-gray-900 font-semibold">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <label class="text-xs font-bold text-gray-400 uppercase">System Role</label>
                                    <p class="mt-1">
                                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-bold uppercase">{{ $user->role }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="mt-8">
                                <a href="{{ route('profile.edit') }}" class="flex items-center justify-center px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-bold">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Integrated Data -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Directory Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-50 bg-gray-50 flex justify-between items-center">
                            <h3 class="font-bold text-gray-800 italic">Global User Directory</h3>
                            <span class="text-[10px] font-bold text-gray-400">TOTAL: {{ count($internalUsers) }}</span>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($internalUsers as $u)
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center border text-indigo-600 font-bold shadow-sm">
                                        {{ strtoupper(substr($u->name, 0, 1)) }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-bold text-gray-900">{{ $u->full_name }}</p>
                                        <p class="text-xs text-gray-500">{{ $u->role }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- External Feed Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-50 bg-gray-50 flex justify-between items-center">
                            <h3 class="font-bold text-gray-800 italic">Latest External Bulletins</h3>
                            <a href="{{ route('external.data') }}" class="text-xs font-bold text-indigo-600 hover:underline">View All &rarr;</a>
                        </div>
                        <div class="divide-y divide-gray-50">
                            @forelse($externalPosts as $post)
                                <div class="p-6 hover:bg-gray-50 transition-colors">
                                    <h4 class="font-bold text-gray-900 mb-2">{{ $post['title'] }}</h4>
                                    <p class="text-sm text-gray-600 leading-relaxed">{{ Str::limit($post['body'], 120) }}</p>
                                </div>
                            @empty
                                <div class="p-12 text-center text-gray-400">
                                    <p class="italic">Bulletin feed is currently unavailable.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
