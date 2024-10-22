<x-layout>
    <div class="row mx-auto">
        <h1>Modifica l'articolo {{$article->title}}</h1>
        <div class="col-6 mx-auto">
            <form action="{{ route('articles.update',$article) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{old('title',$article->title)}}">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <label for="body">Inserisci qui il tuo articolo</label>
                <input type="text" name="body" id="body" class="form-control"  value="{{old('body',$article->body)}}">
                @error('body')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <select name="user_id" id="utente">
                    @foreach ($users as $user)
                        <option @selected($user == $article->user) value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <button>Invia</button>
            </form>
            {{-- @foreach ($errors->all() as $error)
                
            @endforeach --}}
        </div>
    </div>

</x-layout>