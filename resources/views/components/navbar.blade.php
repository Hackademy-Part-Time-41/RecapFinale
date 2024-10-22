<a href="{{route('home')}}"><button class="btn btn-secondary btn-outline-dark">Esempio</button></a>
<a href="{{route('parametrica',['primo','id'=>'secodno'])}}" ><button class="btn btn-secondary btn-outline-dark ">Parametrica</button></a>
@auth
<form class="d-inline" action="/logout" method="post">@csrf<button class="btn btn-secondary btn-outline-dark">Logout</button></form>
@endauth
@guest
<a href="{{route('register')}}" ><button class="btn btn-secondary btn-outline-dark ">Register</button></a>
<a href="{{route('login')}}" ><button class="btn btn-secondary btn-outline-dark ">Login</button></a>
@endguest