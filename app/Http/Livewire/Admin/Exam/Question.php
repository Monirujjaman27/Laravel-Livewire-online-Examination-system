<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Exam;
use App\Models\Option;
use App\Models\Questions;
use Carbon\Carbon;
use Livewire\Component;

class Question extends Component
{
    public $question;
    public $question_id;
    public $option;
    public $item;
    public $exam_id;
    public $exams_in_id;
    public $correct;



    public function selectItem($data, $action)
    {
        $this->exam_id = $data;
        if ($action == 'addQuestion') {
            $this->emit('getModalId', $data);
            $this->dispatchBrowserEvent('openmodal');
        }
    }

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
        validation rule
    */
    protected $rules = [
        'question'  => 'required|unique:exams,name',
        'correct'   => 'required',
        'option.*'  => 'required',
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
        $getval = json_encode(array_values($this->option));

        $validatedData = $this->validate();
        $cquestions = new Questions;
        $cquestions->name     = $this->question;
        $cquestions->correct  = $this->correct;
        $cquestions->exam_id = $this->exam_id;
        $cquestions->options  = $getval;
        $cquestions->save();
        $this->dispatchBrowserEvent('successalert', ['success' => 'Save Successfully']);
        $this->emptyValue();
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshParent');
    }



    // delete into database 
    public function deleteQuestion($id)
    {
        Questions::destroy($id);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }




    /* 
    * empty data after submite
    */
    public function emptyValue()
    {
        $this->question = NULL;
        $this->correct = NULL;
        $this->exam_id = NULL;
        $this->option = NULL;
    }


    public function render()
    {
        return view('livewire.admin.exam.question');
    }
}
