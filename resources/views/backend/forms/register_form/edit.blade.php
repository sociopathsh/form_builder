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

        $(".field").hover(function() {
            $(this).find("a").removeClass("d-none");
        }, function() {
            $(this).find("a").addClass("d-none");
        });

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
                    // console.log(res);
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

});

</script>
@endsection