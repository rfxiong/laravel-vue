<form action="{{$url}}" method="post">
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div id="{{$id}}" class="modal fade show" tabindex="-1" role="dialog" style="padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">{{$title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{$button_name}}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</form>