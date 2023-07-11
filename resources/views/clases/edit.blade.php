<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clases') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form action="{{ route('clases.update', $clase->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="relative z-0 w-full mb-6 group">
                                {{-- <label for="floating_email" class="">Email</label>
                                <input type="email" name="floating_email" id="floating_email" class="" placeholder="" required value="{{ $clase->email }}"/> --}}
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="floating_nombre" class="">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="" placeholder=" " required value="{{ $clase->nombre }}"/>
                            </div>
                            <button type="submit" class="text-black bg-sky-950">Editar</button>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
