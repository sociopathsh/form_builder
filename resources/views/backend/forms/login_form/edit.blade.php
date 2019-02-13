@extends('backend.layouts.app') 
@section('title','Login Form') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @foreach($login_form_fields as $field) @if($field->type == 'radio')
                    <div class="form-group row field">
                        <div class="col-md-4"></div>
                        @foreach($field->radio as $radio)
                        <div class="col-2">
                            <span>{{ $radio->name }}</span>
                            <input type="{{$field->type}}" name="{{ $field->name }}" value="{{ $radio->value }}">
                        </div>
                        @endforeach {{-- <a field-id="{{ $field->id }}" class="edit-icon" href="#"><i id="{{ $field->name }}" class="fa fa-edit d-none"></i></a>                        --}}
                    </div>

                    @else
                    <div class="form-group row field">
                        <label class="col-md-4 col-form-label text-md-right">{{ $field->label }}</label>

                        <div class="col-md-6">
                            <input type="{{$field->type}}" class="form-control" name="{{ $field->name }}" value="" placeholder="{{ $field->placeholder }}">
                        </div>
                        <a field-id="{{ $field->id }}" class="edit-icon" href="#"><i id="{{ $field->name }}" class="fa fa-edit d-none"></i></a>
                    </div>
                    @endif @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('js')
<script>
    $(document).ready(function() {

        $(".field").hover(function() {
            var id = $(this).find("input").attr("name");
            $("#" + id).removeClass("d-none");
        }, function() {
            var id = $(this).find("input").attr("name");
            $("#" + id).addClass("d-none");
        });

        $(".edit-icon").click(function(e) {
            e.preventDefault();
            var field_id = $(this).attr("field-id");
            $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/login_form/fields/' + field_id,
                type: 'GET',
                success: function(res) {
                    var field = res.field;
                    $("#myModal").modal("show");
                    $("#myModal").find("#label-field").val(field.label);
                    $("#myModal").find("#placeholder-field").val(field.placeholder);
                    $("#myModal").find("#field-id").val(field_id);
                }
            });
        });

        $("#field-form").submit(function(e) {
            e.preventDefault();
            var label = $(this).find("#label-field").val();
            var placeholder = $(this).find("#placeholder-field").val();
            var field_id = $(this).find("#field-id").val();
            $.ajax({
                url: '{{ env('APP_URL') }}' + '/admin/login_form/edit',
                type: 'POST',
                data: {field_id : field_id, label : label, placeholder: placeholder, _token: "{{ csrf_token() }}"},
                success: function(res) {
                    if(res.status){
                       window.location =window.location.href;
                    }
                }
            });
        });
});

</script>
@endsection