<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Add New Question</h5>
                    <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-grouup ml-2 mb-2">
                        <label for=""># Question</label>
                        <!-- <input type="hidden" wire:model="exams_id" value="{{$exam_id}}" placeholder="Enter question" class="form-control"> -->
                        <input type="text" wire:model="question" placeholder="Enter question" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <label for=""># Options</label>
                            @for($i = 'a'; $i< 'e' ; $i++) @error('option'.$i) <span class="text-danger error">{{ $message }}</span>@enderror
                                <div class="d-flex mb-3">
                                    <label for="{{ $i}}">{{$i}}. </label>
                                    <input required wire:model="option.{{$i}}" class="form-control" type="text" placeholder="Options" name="" id="">
                                </div>
                                @endfor
                        </div>
                        <div class="col-md-3 col-sm-12">
                            @error('correct') <span class="text-danger error">{{ $message }}</span>@enderror
                            <label for=""># Currect Answer</label>
                            <select required class="form-control" wire:model="correct" id="">
                                <option>Select</option>
                                <option value="a">a</option>
                                <option value="b">b</option>
                                <option value="c">c</option>
                                <option value="d">d</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-toggle="tooltip" data-bs-placement="top" title="Close" wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                    <button data-toggle="tooltip" data-bs-placement="top" title="Save" wire:click="save" class="btn btn-sm btn-info"> Save</button>
                </div>
            </div>
        </div>
    </div>