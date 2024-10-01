<x-app>
    <x-slot:title>
        Edit
    </x-slot>
    
    <form action="/update/{{$todo->id}}" method="POST">
        @csrf
        <input type="text" name="description" value="{{ $todo->description }}">
        <input type="submit" class="btn btn-primary" value="Atualizar">
    </form>
</x-app>


