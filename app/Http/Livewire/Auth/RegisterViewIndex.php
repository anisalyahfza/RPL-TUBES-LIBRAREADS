<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class RegisterViewIndex extends Component
{
    public $page_title = 'Register | LibraReads';

    public function render()
    {
        return view('livewire.auth.register-view-index')
                ->extends('layouts.auth')
                ->section('content');
    }
}
