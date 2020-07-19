<div class="modal fade" id="modalFastEvent" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role = "document">
      <div class="modal-content black">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Modify Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        </div>
            <form id="formFastEvent">
                <div class="form-group row">
                  <label for="title" class="col-sm-4 col-form-label">Title</label>
                  <div class="col-sm-8">
                    <input type="text" name="title" class="form-control" id="title">
                    <input type="hidden" name="id">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="start" class="col-sm-4 col-form-label">Start time</label>
                    <div class="col-sm-8">
                      <input type="time" name="start" class="form-control time"  id="start">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="end" class="col-sm-4 col-form-label">End time</label>
                    <div class="col-sm-8">
                      <input type="time" name="end" class="form-control time" id="end">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="color" class="col-sm-4 col-form-label">Color Flag</label>
                    <div class="col-sm-8">
                      <input type="color" name="color" class="form-control" id="color" value="#7395AE">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label">Description of Event</label>
                    <div class="col-sm-8">
                      <textarea name="description" id="description" cols="35" rows = "4"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="location" class="col-sm-4 col-form-label">Location of Event</label>
                    <div class="col-sm-8">
                      <textarea name="location" id="location" cols="35" rows = "1"></textarea>
                    </div>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary saveFastEvent">Save</button>
        </div>
      </div>
    </div>
  </div>