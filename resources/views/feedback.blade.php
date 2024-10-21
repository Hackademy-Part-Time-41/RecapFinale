<x-layout>
    <div class="container">
        @if(session()->has('success'))
            {{session('success')}}
        @endif
        <form action="{{route('feedback.send')}}" method="POST">
            @csrf
            <label for="name">Inserisci il tuo nome</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="text">Scrivi il tuo feedback</label>
            <input type="text" name="text" id="text" class="form-control">
            <button>Invia</button>
        </form>
    </div>
</x-layout>