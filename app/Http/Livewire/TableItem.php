<?php

namespace App\Http\Livewire;

use App\Models\Index;
use Livewire\Component;
use Livewire\WithPagination;

class TableItem extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $image, $name, $id_wp, $refine, $type, $awaken, $label, $dismantle;
    public $skill_1, $skill_1_desc, $skill_2, $skill_2_desc;
    public $weapon_type, $weapon_element;
    public $search = '';

    protected $listeners = ['deleteItem' => 'destroyItem'];

    public function render()
    {
        $items = Index::where('name', 'like', '%'.$this->search.'%')->paginate(5);
        return view('livewire.table-item', [
            'items' => $items,
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

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

    public function deleteItem($itemId)
    {
        // Index::where('id', $itemId)->delete();
        $this->id_wp = $itemId;

        $item = Index::find($itemId);
        $this->dispatchBrowserEvent('deleteConfirmation', ['item' => $item]);
    }

    public function destroyItem()
    {
        Index::where('id_wp', $this->id_wp)->delete();
    }
}
