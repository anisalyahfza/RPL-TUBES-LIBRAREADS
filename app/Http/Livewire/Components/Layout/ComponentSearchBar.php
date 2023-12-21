<?php

namespace App\Http\Livewire\Components\Layout;

use App\Models\Entity\Book;
use Livewire\Component;

class ComponentSearchBar extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.components.layout.component-search-bar');
    }

    public function getBook()
    {
        $this->emit('searchBook', $this->search);
    }
}
