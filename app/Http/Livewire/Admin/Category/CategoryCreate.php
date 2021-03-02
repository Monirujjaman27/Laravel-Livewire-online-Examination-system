<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $name;
    public $item;
    protected $listeners = [
        'getModalId',
    ];
    /* 
    * action when click close button
    * action when click trush button 
     */
    public function close()
    {
        $this->item = null;
        $this->emptyValue();
    }
    /* 
    value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Category::find($itemIdentity);
        $this->name   =  $fineBydata->name;
    }
    /*  
        validation rule
    */
    protected $rules = [
        'name'   => 'required|max:200|unique:categories,name',
    ];
    /*     
    * live validation preview
    */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $validatedData = $this->validate();
        if ($this->item) {
            Category::find($this->item)->update($validatedData);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->item = null;
            $this->name  = null;
        } else {
            Category::create($validatedData);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->name  = null;
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }
    /* 
    * empty data after submite
    */
    public function emptyValue()
    {
        $this->name = null;
    }
    /* 
    *   livewire view
    */


    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
