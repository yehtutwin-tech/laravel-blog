<?php

namespace App\Livewire;

use App\Models\Tag as ModelsTag;
use Livewire\Component;

class Tag extends Component
{
    public $name = '';

    public $data;

    public function mount()
    {
        $this->data = ModelsTag::all();
    }

    public function render()
    {
        return view('livewire.tag', ['data' => $this->data]);
    }

    public function saveData()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $tag = new ModelsTag();
        $tag->name = $this->name;
        $tag->save();

        return $this->redirect('/tags', navigate:true);
    }
}
