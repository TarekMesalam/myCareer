@extends('layouts.app')
@section('page-title')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ __($pageTitle) }}   <span class="font-bold"></span></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">@lang('app.menu.stickyNotes')</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <a href="javascript:;" onclick="showCreateNoteModal()"  class="btn btn-info m-l-20 btn-rounded btn-outline  waves-effect waves-light">@lang("modules.sticky.addNote")</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row" id="noteBox"></div>
        </div>
    </div>
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @lang('messages.loading')
            </div>
        </div>
    </div>
@endsection
@push('footer-script')
    <script>
        "use script";

        getNoteData();

        function addOrEditStickyNote(id){
            var url = '';
            var method = 'POST';

            if(id === undefined || id == "" || id == null) {
                url =  '{{ route('admin.sticky-note.store') }}'
            } else{
                url = "{{ route('admin.sticky-note.update',':id') }}";
                url = url.replace(':id', id);
                var stickyID = $('#stickyID').val();
                method = 'PUT'
            }

            var noteText = $('#notetext').val();
            var stickyColor = $('#stickyColor').val();

            $.easyAjax({
                url: url,
                container: '#responsive-modal',
                type: method,
                data:{'notetext':noteText,'stickyColor':stickyColor,'_token':'{{ csrf_token() }}'},
                success: function (response) {
                    $("#responsive-modal").modal('hide');
                    getNoteData();
                }
            });
        }

        function showCreateNoteModal(){
            var url = '{{ route('admin.sticky-note.create') }}';

            $("#responsive-modal").removeData('bs.modal').modal({
                remote: url,
                show: true
            });

            $('#responsive-modal').on('hidden.bs.modal', function () {
                $(this).find('.modal-body').html("@lang('messages.loading')");
                $(this).data('bs.modal', null);
            });

            return false;
        }

        function showEditNoteModal(id){
            var url = '{{ route('admin.sticky-note.edit',':id') }}';
            url  = url.replace(':id',id);

            $("#responsive-modal").removeData('bs.modal').modal({
                remote: url,
                show: true
            });

            $('#responsive-modal').on('hidden.bs.modal', function () {
                $(this).find('.modal-body').html("@lang('messages.loading')");
                $(this).data('bs.modal', null);
            });

            return false;
        }

        function selectColor(id){
            $('.icolors li.active ').removeClass('active');
            $('#'+id).addClass('active');
            $('#stickyColor').val(id);
        }

        function deleteSticky(id){
            swal({
                title: "@lang('errors.areYouSure')",
                text: "@lang('errors.deleteWarning')",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('app.delete')",
                cancelButtonText: "@lang('app.cancel')",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {
                    var url = "{{ route('admin.sticky-note.destroy',':id') }}";
                    url = url.replace(':id', id);

                    var token = "{{ csrf_token() }}";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            $('#stickyBox_'+id).hide('slow');
                            $("#responsive-modal").modal('hide');
                            getNoteData();
                        }
                    });
                }
            });
        }

        function getNoteData(){
            var url = "{{ route('admin.sticky-note.index') }}";

            $.easyAjax({
                type: 'GET',
                url: url,
                messagePosition: '',
                data:  {},
                container: ".noteBox",
                error: function (response) {
                    $('#noteBox').html(response.responseText);
                }
            });
        }
    </script>
@endpush
