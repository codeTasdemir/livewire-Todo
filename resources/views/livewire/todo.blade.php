<div class="todo-list-container">
   <div class="inner">

           <input type="text" wire:model="todo" placeholder="Todo...">
           <button wire:click="add">Add Todo</button>
           <button wire:click="deleteAll">Delete All</button>

           <ul>
               @foreach ($todos as $index => $todo)
                   <li wire:key="todo-{{ $index }}">
                       {{ $todo }}
                       <button wire:click="deleteItem({{ $index }})">Delete</button>
                   </li>
               @endforeach
           </ul>

   </div>
</div>
