<?php

namespace App\Http\Livewire\Admin\Exam;

use App\Models\Category;
use App\Models\Exam;
use App\Models\Questions;
use Livewire\Component;

class QuestionCreate extends Component
{
    public $name;
    public $ncount;
    public $qcount;
    public $question;
    public $correct;
    public $option;
    public $category_id;
    public $item;
    public $exam;
    protected $listeners = ['refreshParent' => '$refresh'];

    public function mount(Exam $id)
    {
        $this->exam =  $id;
    }

    // delete into database 
    public function deleteQuestion($id)
    {
        Questions::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    public function selectItem($data, $action)
    {
        $this->exam_id = $data;
        if ($action == 'addQuestion') {
            $this->emit('getModalId', $data);
            $this->dispatchBrowserEvent('openmodal');
        }
    }


    /* 
    *   livewire view
    */
    public function render()
    {
        return view(
            'livewire.admin.exam.question-create',
            [
                'exam' => $this->exam,
                'allQuestions' => Questions::where('exam_id', $this->exam->id)->orderBy('id', 'DESC')->get(),
            ]
        );
    }
}
