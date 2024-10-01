<x-app>
    <x-slot:title>
        Add
    </x-slot>

    <x-slot:nav>
        <x-nav></x-nav>
    </x-slot>

    <form method="post" action="/add">
        @csrf
        <input type="text" name="description" id="desc" required>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
    
    @if(session('status'))
       <x-alert type="{{ session('status')['type'] }}">
            {{ session('status')['message'] }}
       </x-alert> 
    @endif
</x-app>




