<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Product;
use App\Models\Todo as TodoModel;


class Todo extends Component
{

    public $todos = [];
    public $todo = '';

    public function mount()
    {
        $this->todos = TodoModel::all()->pluck('title')->toArray();
    }

    public function add()
    {
        $this->validate([
            'todo' => 'required|string|max:255',
        ]);

        $newTodo = TodoModel::create(['title' => $this->todo]);
        $this->todos[] = $newTodo->title;

        $this->todo = '';
    }

    public function deleteAll()
    {
        TodoModel::truncate();
        $this->todos = [];
    }

    public function deleteItem($index)
    {
        $todo = TodoModel::where('title', $this->todos[$index])->first();
        if ($todo) {
            $todo->delete();
        }

        unset($this->todos[$index]);
        $this->todos = array_values($this->todos);
    }



}
