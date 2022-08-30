<?php

namespace App\Http\Livewire;

use App\Http\Requests\IndexRequest;
use App\Models\Index;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateItem extends Component
{
    use WithFileUploads;

    public $image, $name, $id_wp, $refine, $type, $awaken, $label, $dismantle;
    public $skill_1, $skill_1_desc, $skill_2, $skill_2_desc;
    public $weapon_type, $weapon_element;

    public function render()
    {
        return view('livewire.create-item');
    }

    public function rules()
    {
        return [
            'image' => 'required|image',
            'name' => 'required|min:5|max:255',
            'id_wp' => 'required|integer',
            'refine' => 'required',
            'type' => 'required',
            'awaken' => 'required',
            'label' => 'required',
            'skill_1' => 'required|min:5|max:255',
            'skill_1_desc' => 'required|min:5|max:255',
            'skill_2' => 'required|min:5|max:255',
            'skill_2_desc' => 'required|min:5|max:255',
        ];
    }

    public function store()
    {
        $this->validate();

        $data = [
            'image' => $this->image->store('items', 'public'),
            'name' => $this->name,
            'id_wp' => $this->id_wp,
            'refine' => $this->refine,
            'type' => $this->type,
            'awaken' => $this->awaken,
            'weapon_type' => $this->weapon_type,
            'weapon_element' => $this->weapon_element,
            'label' => $this->label,
            'dismantle' => $this->dismantle,
            'skill_1' => $this->skill_1,
            'skill_1_desc' => $this->skill_1_desc,
            'skill_2' => $this->skill_2,
            'skill_2_desc' => $this->skill_2_desc,
        ];
        Index::create($data);

        $this->image = null;
        $this->name = null;
        $this->id_wp = null;
        $this->refine = null;
        $this->type = null;
        $this->awaken = null;
        $this->weapon_type = null;
        $this->weapon_element = null;
        $this->label = null;
        $this->dismantle = null;
        $this->skill_1 = null;
        $this->skill_1_desc = null;
        $this->skill_2 = null;
        $this->skill_2_desc = null;
    }
}