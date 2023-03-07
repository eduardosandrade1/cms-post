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

                    Cadastrar post
                </a>

                <a href="{{route('admin.list.posts')}}"
                    class="{{$active == 'list-posts' ? 'bg-indigo-800' : ''}} text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center rounded-md px-2 py-2 text-sm font-medium">

                    Visualizar posts
                </a>
                <a href="{{route('admin.list.posts.deactivate')}}"
                    class="{{$active == 'list-posts-deactivate' ? 'bg-indigo-800' : ''}} text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center rounded-md px-2 py-2 text-sm font-medium">

                    Visualizar posts Desativados
                </a>
                <a href="{{route('admin.user.register')}}"
                    class="{{$active == 'user-register' ? 'bg-indigo-800' : ''}} text-white hover:bg-indigo-600 hover:bg-opacity-75 group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                    Adicionar Administrator
                </a>
            </nav>
        </div>
        <div class="flex flex-shrink-0 border-t border-indigo-800 p-4">
            <a href="#" class="group block w-full flex-shrink-0">
                <div class="flex items-center">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{Auth::user()->name}}</p>

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="text-xs font-medium text-indigo-200 group-hover:text-white">Sair</button>
                        </form>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
