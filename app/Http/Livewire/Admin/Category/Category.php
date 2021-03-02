<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{

    
    public $perPage = 10;

    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        ModelsCategory::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        }
    }


    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }

    public function render()
    {
        return view('livewire.admin.category.category', [
            'datas' => ModelsCategory::latest()->where('name', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
                'allcat' =>  ModelsCategory::all()
        ]);
    }
}
