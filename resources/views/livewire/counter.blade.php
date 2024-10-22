<div m-5>
    <h1>{{$counter}}</h1>
    <button wire:click="increment">+1</button>
    <button wire:click="decrement">-1</button>

    <h2>{{$text}}</h2>
    <input type="text" wire:model.blur="text">
</div>
