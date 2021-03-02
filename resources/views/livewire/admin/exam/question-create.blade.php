<div>
    @section('title')
    {{'Questions'}}
    @endsection
    @livewire('admin.exam.question')
    <!-- Main content -->
    <div class="content mx-0">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body d-flex">
                        <strong> Exam: </strong>
                        <p>{{ ucfirst($exam->name)}}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <span>Total Questions: {{ $allQuestions->count()}}</span>
                        <div class="float-right">
                            <button wire:click="selectItem({{$exam->id}}, 'addQuestion')" class="btn float-right btn-sm btn-primary"><i class="fa fa-plus-circle text-success fa-lg"></i> Add New Question</button>
                        </div>
                    </div>
                </div>
                @php $i=1; @endphp
                @foreach($allQuestions as $nAllQ)
                <div class="card">
                    <div class="card-header bg-white">
                        <strong> #{{$i}}. {{$nAllQ->name}}</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @php $i = 'a'; $opt = json_decode($nAllQ->options) @endphp
                            @foreach($opt as $opitem)
                            <div class="col-sm-12 col-md-6">
                                <input type="hidden" name="" id="">
                                <label for="">({{$i}})</label>
                                <label for=""> {{$opitem}} </label>
                            </div>
                            @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex">
                        <button data-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn mr-3 p-0"><i class="fa fa-edit text-warning"></i></button>
                        <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="deleteQuestion({{$nAllQ->id}})" class="btn mr-3 p-0"><i class="fa fa-trash text-danger"></i></button>
                        <div>Correct Ans ({{$nAllQ->correct}})</div>
                    </div>
                </div>
                @php $i++; @endphp
                @endforeach
            </div>


            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-success">Exam Information</h5>
                    </div>
                    <div class="card-body">
                        <strong>Subject:</strong> {{$exam->category->name}}<br>
                        <strong>Time:</strong> {{$exam->duration}} <br>
                        <strong>Date:</strong> {{$exam->exam_date}} <br>
                        @if(isset($exam->exam_end_date)) <strong>End Date:</strong> {{$exam->exam_end_date}} <br> @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>