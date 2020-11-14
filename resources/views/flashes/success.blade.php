@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{\Illuminate\Support\Facades\Session::get('success')}}</p>
    </div>
@endif
