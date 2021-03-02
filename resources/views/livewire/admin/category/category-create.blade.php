<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-success" id="exampleModalLabel">Category</h5>
                    <button wire:click="close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card p-3">
                        <div class="form-group">
                            {{$name}}
                            <label for="name">Name:</label>
                            @if($errors->has('name'))<span class="text-danger">{{$errors->first('name')}}</span> @endif
                            <input wire:model="name" id="name" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="close" type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                    <button wire:click="save" class="btn btn-sm btn-info"> Save</button>
                </div>
            </div>
        </div>
    </div>
</div>