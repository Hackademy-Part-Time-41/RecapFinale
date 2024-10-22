<x-layout>
    <div class="row mx-auto">
        <h1>Crea un nuovo articolo</h1>
        <div class="col-6 mx-auto">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="body">Inserisci qui il tuo articolo</label>
                <input type="text" name="body" id="body" class="form-control"  value="{{old('body')}}">
                @error('body')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <select name="user_id" id="utente">
                    <option selected value="">Scegli un utente</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" name="categories[]" type="checkbox" value="{{$category->id}}" id="{{$category->id}}">
                    <label class="form-check-label" for="{{$category->id}}">
                      {{$category->name}}
                    </label>
                  </div>
                @endforeach
                <label for="image">Immagine di copertina</label>
                <input type="file" name="image" id="image">
                <button>Invia</button>
            </form>
            {{-- @foreach ($errors->all() as $error)
                
            @endforeach --}}
        </div>
    </div>

</x-layout>
