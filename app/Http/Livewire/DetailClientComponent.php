<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class DetailClientComponent extends Component
{

    public $order = 0;
    public $client;

    public function render()
    {
        if ($this->order > 0) {
            dd($this->order);
        }
        return view('livewire.detail-client-component');
    }

    public function selectOrder($order)
    {

        $this->order = $order;
    }
}
