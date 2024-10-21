<x-layout>
    <div class="container">
        <form action="/login" method="POST">
            @csrf
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <label for="pwd1">Password</label>
            <input type="text" name="password" id="pwd1" class="form-control">
            
            <button>Invia</button>
        </form>
    </div>
</x-layout>