<div>
    @section('title')
    {{'Exam'}}
    @endsection
    @livewire('admin.category.category-create')
    <!-- Main content -->
    <div class="content mx-0">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card d_sm_none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group">
                                            <label for="">Exam Name</label>
                                            @if($errors->has('exam'))<span class="text-danger">{{$errors->first('exam')}}</span> @endif
                                            <input required type="text" wire:model="exam" placeholder="Exam Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button wire:click="save" class="mt-4 btn btn-sm btn-info"> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @php $i=1 @endphp
                        @foreach($examdatas as $nexamdata)
                        <div class="card">
                            <div class="card-header bg-white">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        @if(isset($nexamdata->category))<div class="mr-1"> <i class="fa fa-tags"></i> {{$nexamdata->category->name}} </div>@endif
                                        <div class="mr-1"> <i class="fa fa-user"></i> {{'Admin'}}</div>
                                        @if(isset($nexamdata->duration))<div class="mr-2"><i class="fa fa-clock"></i> Time: {{$nexamdata->duration}}</div>@endif
                                        @if(isset($nexamdata->exam_date))<div class="mr-2"><i class="fa fa-clock"></i> Exam Date: {{$nexamdata->exam_date}}</div>@endif
                                        <button class="btn mr-2 p-0"> <?php if ($nexamdata->status == 0) { ?> <span data-toggle="tooltip" data-bs-placement="top" title="Click To Inactive This" wire:click="selectItem({{$nexamdata->id}}, 'inactive')" class="btn badge rounded-pill bg-success">Active
                                                </span>
                                            <?php } else {
                                            ?> <span data-toggle="tooltip" data-bs-placement="top" title="Cleck To Active This" wire:click="selectItem({{$nexamdata->id}}, 'active')" class="btn badge rounded-pill bg-warning">Draft</span> <?php } ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6> {{'#'.$i.'.'. ucfirst($nexamdata->name)}}</h6>
                            </div>
                            <div class="card-footer bg-white">
                                <div class="d-flex">
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Add Questions" class="btn mr-3 p-0"><a href="{{route('admin.questions.create', $nexamdata->id)}}"><i class="fa fa-plus-circle text-info"></i></a></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="View Exam" class="btn mr-3 p-0"><i class="fa fa-eye text-success"></i></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Edit Exam" class="btn mr-3 p-0"><i class="fa fa-edit text-warning"></i></button>
                                    <button data-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirm('Are you sure to delete it?') || event.stopImmediatePropagation()" wire:click="deleteExam({{$nexamdata->id}})" class="btn mr-3 p-0"><i class="fa fa-trash text-danger"></i></button>
                                    <strong>Total Question ({{$nexamdata->question->count()}})</strong>
                                </div>
                            </div>
                        </div>
                        @php $i++ @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-12 d-md-none">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Exam Name</label>
                                            @if($errors->has('exam'))<span class="text-danger">{{$errors->first('exam')}}</span> @endif
                                            <input required type="text" wire:model="exam" placeholder="Exam Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-success">Exam Start Date</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if($errors->has('exam_date'))<span class="text-danger">{{$errors->first('exam_date')}}</span> @endif
                            <input class="form-control" type="datetime-local" wire:model="exam_date" id="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-success">Exam End Date</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if($errors->has('exam_end_date'))<span class="text-danger">{{$errors->first('exam_end_date')}}</span> @endif
                            <input class="form-control" type="datetime-local" wire:model="exam_end_date" id="">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-success">Duration</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @if($errors->has('duration'))<span class="text-danger">{{$errors->first('duration')}}</span> @endif
                            <select class="form-control" wire:model="duration" id="">
                                <option>Select</option>
                                <option value="15 Minute">15 Minute</option>
                                <option value="30 Minute">30 Minute</option>
                                <option value="45 Minute">30 Minute</option>
                                <option value="1 Hour">1 Hours</option>
                                <option value="1:30 Minute">1:30 Minute</option>
                                <option value="2 Hours">2 Hours</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-success">Subject</h5>
                    </div>
                    <div class="card-body">
                        @if($errors->has('category_id'))<span class="text-danger">{{$errors->first('category_id')}}</span> @endif
                        @foreach($category as $newcat)
                        <div class="form-group p-0 m-0 d-flex">
                            <input required type="radio" wire:model="category_id" value="{{$newcat->id}}" id="catId{{$newcat->id}}">
                            <label class="ml-1" for="catId{{$newcat->id}}">{{$newcat->name}}</label>
                        </div>
                        @endforeach
                        <button class="btn btn-sm text-info p-0 m-0" data-toggle="modal" data-target="#modalForm">+ Add new</button>
                    </div>
                </div>
            </div>
        </div>