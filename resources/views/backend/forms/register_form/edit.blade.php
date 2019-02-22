@extends('backend.layouts.app') 
@section('title','Register Form') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @foreach($register_form_fields as $field) @if($field["type"] === 'radio')
                    <div class="form-group row field">
                        <label class="col-md-4 col-form-label text-md-right">{{ $field["label"] }}</label>
                        <input type="hidden" class="field-id" value="{{ $field['id'] }}"> @foreach($field["radios"] as $radio)
                        <div class="col-2 radio-field">
                            <span class="name">{{ $radio["name"] }}</span>
                            <input type="hidden" class="value" value="{{ $radio['value'] }}">
                            <input type="hidden" class="radio-id" value="{{ $radio['id'] }}">
                            <input type="{{$field['type'] }}">
                            <a class="d-none radio-edit-btn" href="#" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-edit"></i></a>
                        </div>
                        @endforeach
                        <a class="d-none radio-add-new-btn" href="#" data-toggle="tooltip" data-placement="top" title="add new"><i class="fa fa-plus"></i></a>
                    </div>
                    @elseif($field["type"] === 'select')
                    <div class="form-group row field">
                        <input type="hidden" class="field-id" value="{{ $field['id'] }}">
                        <label class="col-4 col-4 col-form-label text-md-right">{{ $field["label"] }}</label>
                        <div class="col-6 col-6">
                            <select class="form-control">
                                @foreach($field["options"]
                                as $option)
                               <option value="{{ $option['value'] }}" option-id="{{ $option['id'] }}">{{ $option["name"] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2 col-2">
                            <a class="d-none select-edit-btn" href="#" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-edit"></i></a>
                            <a class="d-none select-delete-btn" href="#" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa fa-trash"></i></a>
                            <a class="d-none select-add-btn" href="#" data-toggle="tooltip" data-placement="top" title="add new"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    @else
                    <div class="form-group row field">
                        <label class="col-md-4 col-form-label text-md-right">{{ $field["label"] }}</label>
                        <div class="col-md-6">
                            <input type="hidden" class="field-id" value="{{ $field['id'] }}">
                            <input type="{{$field['type']}}" class="form-control placeholder" placeholder="{{ $field['placeholder'] }}">
                        </div>
                        <a class="d-none text-field-edit-btn" href="#" data-toggle="tooltip" data-placement="top" title="edit"><i class="fa fa-edit"></i></a>
                    </div>
                    @endif @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('css')
<style>
    .field i {
        font-size: 12px;
        color: skyblue;
    }
</style>
@endsection
 
@section('js')
<script>
    $(document).ready(function() {

        $(".field a").removeClass("d-none");

        // $(".field").hover(function() {
        //     $(this).find("a").removeClass("d-none");
        // }, function() {
        //     $(this).find("a").addClass("d-none");
        // });

        $(".field").on("click","a", function(e) {
            e.preventDefault();
        });

        $(".field .text-field-edit-btn").click(function() {
            $("#text-field-modal").modal("show");
            var field = $(this).parents(".field");
            var label = field.find("label").text();
            var placeholder = field.find(".placeholder").attr("placeholder");
            var field_id = field.find(".field-id").val();
            $("#text-field-modal .modal-title").text("Edit " + label);
            $("#text-field-modal #label-field").val(label);
            $("#text-field-modal #placeholder-field").val(placeholder);
            $("#text-field-modal input[name='field_id']").val(field_id);
        });

        $("#text-field-modal form").submit(function(e) {
            e.preventDefault();
                $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/register_form/edit',
                type: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    if(res){
                        window.location =window.location.href;
                    }
                }
            });
            
        });

        $(".field .radio-add-new-btn").click(function() {
            $("#radio-modal").modal("show");
            var field = $(this).parents(".field");
            var field_id = field.find(".field-id").val();
            var label = field.find("label").text();
            $("#radio-modal .modal-title").text("Add new " + label.toLowerCase());
            $("#radio-modal input[name='field_id']").val(field_id);
        });

        $("#radio-modal form").submit(function(e) {
            e.preventDefault();
                $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/register_form/edit',
                type: 'POST',
                data: $(this).serialize(),
                success: function(res) { 
                    if(res){
                        window.location =window.location.href;
                    }
                }
            });
            
        });

        $(".field .radio-edit-btn").click(function() {
            $("#radio-modal").modal("show");
            var field = $(this).parents(".field");
            var field_id = field.find(".field-id").val();
            var label = field.find("label").text();
            var radio_field = $(this).parents(".radio-field");
            var name = radio_field.find(".name").text();
            var value = radio_field.find(".value").val();
            var radio_id = radio_field.find(".radio-id").val();
            $("#radio-modal .modal-title").text("Edit " + label);
            $("#radio-modal input[name='name']").val(name);
            $("#radio-modal input[name='value']").val(value);
            $("#radio-modal input[name='field_id']").val(field_id);
            $("#radio-modal input[name='radio_id']").val(radio_id);
        });

        // $(".field .select-edit-btn").click(function() {
        //     $("#select-modal").modal("show");
        //     var field = $(this).parents(".field");
        // });


        //Select 
        $(".field .select-delete-btn").click(function() {
            var field = $(this).parents(".field");
            var field_id = field.find(".field-id").val();
            var selected_id = field.find("select option:selected").attr("option-id");
            var selected_name = field.find("select option:selected").text();
            if(confirm(selected_name + " will be deleted?")){
                $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/register_form/edit',
                type: 'POST',
                data: {type: 'select', action: 'delete', field_id : field_id, option_id: selected_id, _token: "{{csrf_token()}}" },
                success: function(res) {
                    if(res){
                        window.location = window.location.href;
                    }
                }
            });
            }         
        });

        $(".field .select-add-btn").click(function() {
            $("#select-add-modal").modal("show");
            var field = $(this).parents(".field");
            var field_id = field.find(".field-id").val();
            $("#select-add-modal input[name='field_id']").val(field_id);
        });

        $("#select-add-modal form").submit(function(e) {
            e.preventDefault();
            var data = getFormData($(this));
            data.type = "select";
            data.action = "add";
            $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/register_form/edit',
                type: 'POST',
                data: data,
                success: function(res) {
                    if(res){
                        window.location = window.location.href;
                    }
                }
            });
        });

        $(".field .select-edit-btn").click(function() {
            $("#select-edit-modal").modal("show");
            var field = $(this).parents(".field");
            var field_id = field.find(".field-id").val();
            var selected_id = field.find("select option:selected").attr("option-id");
            var selected_value = field.find("select option:selected").attr("value");
            var selected_name = field.find("select option:selected").text();

            $("#select-edit-modal input[name='field_id']").val(field_id);
            $("#select-edit-modal input[name='name']").val(selected_name);
            $("#select-edit-modal input[name='value']").val(selected_value);
            $("#select-edit-modal input[name='option_id']").val(selected_id);
            
        });

        $("#select-edit-modal form").submit(function(e) {
            e.preventDefault();
            var data = getFormData($(this));
            data.type = "select";
            data.action = "edit";
            $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/register_form/edit',
                type: 'POST',
                data: data,
                success: function(res) {
                    if(res){
                        window.location = window.location.href;
                    }
                }
            });
        });

        function getFormData($form){
            var unindexed_array = $form.serializeArray();
            var indexed_array = {};

            $.map(unindexed_array, function(n, i){
                indexed_array[n['name']] = n['value'];
            });

            return indexed_array;
        }

        

});

</script>
@endsection