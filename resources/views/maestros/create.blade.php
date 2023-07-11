<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('status'))
                    <span class="bg-green-500 p-1">{{ session('status') }}
                        @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="flex flex-col gap-3" method="POST" action="{{ route('maestros.store') }}">
                        @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="nombre" class="">Nombre</label>
                            <input type="text" name="nombre" id="nombre" required>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="email" class="">Correo electrónico</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="pass" class="">Contraseña</label>
                            <input type="password" name="pass" id="pass" required>
                        </div>
                        <button type="submit" class="text-black bg-sky-950">Crear usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
