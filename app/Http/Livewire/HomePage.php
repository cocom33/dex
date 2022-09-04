<?php

namespace App\Http\Livewire;

use App\Models\Index;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $image, $name, $id_wp, $refine, $type, $awaken, $label, $dismantle;
    public $skill_1, $skill_1_desc, $skill_2, $skill_2_desc;
    public $weapon_type, $weapon_element;

    public $search = '';
    public $filter = ['dress', 'pet', 'weapon', 'badge'];

    public function render()
    {
        $items = Index::whereIn('type', $this->filter)->paginate(12);
        return view('livewire.home-page', [
            'items' => $items,
        ])->extends('layouts.home')->section('content');
    }

    public function semua()
    {
        $this->filter = ['dress', 'pet', 'weapon', 'badge'];
        $this->resetPage();
    }

    public function dress()
    {
        $this->filter = ['dress'];
        $this->resetPage();
    }

    public function weapon()
    {
        $this->filter = ['weapon'];
        $this->resetPage();
    }

    public function pet()
    {
        $this->filter = ['pet'];
        $this->resetPage();
    }

    public function badge()
    {
        $this->filter = ['badge'];
        $this->resetPage();
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function showItem($item)
    {
        $this->image = $item['image'];
        $this->name = $item['name'];
        $this->id_wp = $item['id_wp'];
        $this->refine = $item['refine'];
        $this->type = $item['type'];
        $this->awaken = $item['awaken'];
        $this->weapon_type = $item['weapon_type'];
        $this->weapon_element = $item['weapon_element'];
        $this->label = $item['label'];
        $this->dismantle = $item['dismantle'];
        $this->skill_1 = $item['skill_1'];
        $this->skill_1_desc = $item['skill_1_desc'];
        $this->skill_2 = $item['skill_2'];
        $this->skill_2_desc = $item['skill_2_desc'];
    }
}