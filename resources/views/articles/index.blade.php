<x-layout>
    <h1>
        Elenco di tutti gli articoli
    </h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                
            <tr>
              <th scope="row"><img src="{{Storage::url($article->image)}}" style="max-width: 100px;" alt="CoverImage" class="rounded"></th>
              <td>{{$article->title}}</td>
              <td><a href="{{route('articles.edit',$article)}}"><button class="btn btn-secondary">Modifica</button></a>
                <form action="{{route('articles.destroy',$article)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Elimina</button>
                </form>
            </td>
            </tr>
            @endforeach
         
        </tbody>
      </table>
</x-layout>