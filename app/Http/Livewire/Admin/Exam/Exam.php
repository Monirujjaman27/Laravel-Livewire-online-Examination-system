<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Category;
use App\Models\Exam as ModelsExam;
use Carbon\Carbon;
use Livewire\Component;

class Exam extends Component
{
    public $perPage = 2;
    public $qcount;
    public $exam;
    public $category_id;
    public $duration;
    public $exam_date;
    public $exam_end_date;
    protected $listeners = ['refreshParent' => '$refresh'];
    public $item;


    /*  
        validation rule
    */
    protected $rules = [
        'exam'        => 'required|unique:exams,name',
        'category_id' => 'required',
        'duration'    => 'required',
        'exam_date'   => 'required',
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
    public function saveCategory()
    {
        $validatedData = $this->validate();
        Category::create($validatedData);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }
    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $validatedData = $this->validate();
        $cExam = ModelsExam::create([
            'name'          => $this->exam,
            'category_id'   => $this->category_id,
            'duration'      => $this->duration,
            'exam_date'     => $this->exam_date,
            'exam_end_date' => $this->exam_end_date,
            'created_at'    => Carbon::now()
        ]);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
        $this->emptyValue();
        $this->emit('refreshParent');
    }
    /* 
    * empty data after submite
    */
    public function emptyValue()
    {
        $this->exam = null;
        $this->category_id = null;
    }
    /* 
    *   livewire view
    */
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newdata = ModelsExam::find($data);
        if ($action == 'edit') {
            $descData = $newdata->description;
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openEditmodal');
            $this->dispatchBrowserEvent('desc-updated', ['oldDesc' => $descData]);
        } elseif ($action == 'inactive') { /* action where click status button */
            $newdata->status = 1;
            $newdata->save();
        } elseif ($action == 'addquestions') { /* action where click status button */
            $this->emit('addQuestionsView', $data);
            return redirect(route('admin.questions.create'));
        } else {
            $newdata->status = 0;
            $newdata->save();
        }
    }

    // delete into database 
    public function deleteExam($id)
    {
        ModelsExam::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }


    public function loadMore()
    {
        $this->perPage = $this->perPage + 2;
    }



    public function render()
    {
        $category  = Category::where('status', 0)->get();
        $examdatas = ModelsExam::latest()->with('category')->with('question')->orderBy('id', 'DESC')->paginate($this->perPage);
        return view('livewire.admin.exam.exam', compact(['category', 'examdatas']));
    }
}
