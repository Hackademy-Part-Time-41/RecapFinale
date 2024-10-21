<x-layout>
    <div class="container">
        <form action="/register" method="POST">
            @csrf
            <label for="name">Inserisci il tuo nome</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <label for="pwd1">Password</label>
            <input type="text" name="password" id="pwd1" class="form-control">
            <label for="pwd2">Conferma password</label>
            <input type="text" name="password_confirmation" id="pwd2" class="form-control">
            <button>Invia</button>
        </form>
    </div>
</x-layout>