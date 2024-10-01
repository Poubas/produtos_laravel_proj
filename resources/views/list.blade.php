<x-app>
    <x-slot:title>
        List
    </x-slot>

    <x-slot:nav>
        <x-nav></x-nav>
    </x-slot>

    @if (count($todos) > 0)
    <ul>
        @foreach ($todos as $todo)
        <li>
            {{ $todo->description }}
            <input type="checkbox" @if ($todo->completed) checked @endif>
            <a href="/edit/{{$todo->id}}">edit</a>
            <a href="/delete/{{$todo->id}}">delete</a>
        </li>
        @endforeach
    </ul>
    @else
    No data
    @endif
    
    @if(session('status'))        
        <x-alert type="{{ session('status')['type'] }}">
            {{ session('status')['message'] }}
        </x-alert>
    @endif
</x-app>
        

