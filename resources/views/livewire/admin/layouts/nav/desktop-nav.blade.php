<!-- Static sidebar for desktop -->
<div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex min-h-0 flex-1 flex-col bg-indigo-700">
        <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
            <div class="flex flex-shrink-0 items-center px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=300"
                    alt="Your Company">
            </div>
            <nav class="mt-5 flex-1 space-y-1 px-2">
                <!-- Current: "bg-indigo-800 text-white", Default: "text-white hover:bg-indigo-600 hover:bg-opacity-75" -->
                <a href="{{route('admin.dashboard')}}"
                    class="{{$active == 'dashboard' ? 'bg-indigo-800' : ''}} text-white group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{route('admin.register.post')}}"
                    class="{{$active == 'register-post' ? 'bg-indigo-800' : ''}} text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    Cadastrar post
                </a>

                <a href="{{route('admin.list.posts')}}"
                    class="{{$active == 'list-posts' ? 'bg-indigo-800' : ''}} text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    Visualizar posts
                </a>
                <a href="{{route('admin.list.posts.deactivate')}}"
                    class="{{$active == 'list-posts-deactivate' ? 'bg-indigo-800' : ''}} text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                    <svg class="mr-3 h-6 w-6 flex-shrink-0 text-indigo-300" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                    Visualizar posts Desativados
                </a>
            </nav>
        </div>
        {{-- <div class="flex flex-shrink-0 border-t border-indigo-800 p-4">
            <a href="#" class="group block w-full flex-shrink-0">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block h-9 w-9 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">Tom Cook</p>
                        <p class="text-xs font-medium text-indigo-200 group-hover:text-white">View profile</p>
                    </div>
                </div>
            </a>
        </div> --}}
    </div>
</div>
