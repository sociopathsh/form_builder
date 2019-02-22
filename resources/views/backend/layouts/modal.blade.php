<!-- Text Field Modal -->

<div class="modal fade" id="text-field-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="label-tab" data-toggle="tab" href="#label-content" role="tab" aria-controls="label"
                                aria-selected="true">Label</a>
                            <a class="nav-item nav-link" id="placeholder-tab" data-toggle="tab" href="#placeholder-content" role="tab" aria-controls="placeholder"
                                aria-selected="false">Placeholder</a>
                        </div>
                    </nav>
                    <div class="tab-content mt-3" id="nav-tabContent">
                        <input type="hidden" name="field_id">
                        <div class="tab-pane fade show active" id="label-content" role="tabpanel" aria-labelledby="label-tab">
                            <input name="label" required type="text" id="label-field" class="form-control">
                        </div>
                        <div class="tab-pane fade" id="placeholder-content" role="tabpanel" aria-labelledby="placeholder-tab">
                            <input name="placeholder" required type="text" id="placeholder-field" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Text Field Modal -->


<!-- Radio Field Modal -->

<div class="modal fade" id="radio-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="name-tab" data-toggle="tab" href="#name-content" role="tab" aria-controls="name"
                                aria-selected="true">Name</a>
                            <a class="nav-item nav-link" id="value-tab" data-toggle="tab" href="#value-content" role="tab" aria-controls="value" aria-selected="false">Value</a>
                        </div>
                    </nav>
                    <div class="tab-content mt-3" id="nav-tabContent">
                        <input type="hidden" name="field_id">
                        <input type="hidden" name="radio_id">
                        <div class="tab-pane fade show active" id="name-content" role="tabpanel" aria-labelledby="name-tab">
                            <input name="name" required type="text" class="form-control">
                        </div>
                        <div class="tab-pane fade" id="value-content" role="tabpanel" aria-labelledby="value-tab">
                            <input name="value" required type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Radio Field Modal -->


<!-- Select Field Modal -->

<div class="modal fade" id="select-add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add new option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="select-add-name-tab" data-toggle="tab" href="#select-add-name-content" role="tab"
                                aria-controls="select-add-name" aria-selected="true">Name</a>
                            <a class="nav-item nav-link" id="select-add-value-tab" data-toggle="tab" href="#select-add-value-content" role="tab" aria-controls="select-add-value"
                                aria-selected="false">Value</a>
                        </div>
                    </nav>
                    <div class="tab-content mt-3" id="nav-tabContent">
                        <input type="hidden" name="field_id">
                        <div class="tab-pane fade show active" id="select-add-name-content" role="tabpanel" aria-labelledby="select-add-name-tab">
                            <input name="name" required type="text" class="form-control">
                        </div>
                        <div class="tab-pane fade" id="select-add-value-content" role="tabpanel" aria-labelledby="select-add-value-tab">
                            <input name="value" required type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="select-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="select-edit-name-tab" data-toggle="tab" href="#select-edit-name-content" role="tab"
                                aria-controls="select-edit-name" aria-selected="true">Name</a>
                            <a class="nav-item nav-link" id="select-edit-value-tab" data-toggle="tab" href="#select-edit-value-content" role="tab" aria-controls="select-edit-value"
                                aria-selected="false">Value</a>
                        </div>
                    </nav>
                    <div class="tab-content mt-3" id="nav-tabContent">
                        <input type="hidden" name="field_id">
                        <input type="hidden" name="option_id">
                        <div class="tab-pane fade show active" id="select-edit-name-content" role="tabpanel" aria-labelledby="select-edit-name-tab">
                            <input name="name" required type="text" class="form-control">
                        </div>
                        <div class="tab-pane fade" id="select-edit-value-content" role="tabpanel" aria-labelledby="select-edit-value-tab">
                            <input name="value" required type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Select Field Modal -->