<form action="{{route('password.email')}}" method="post" class="form-horizontal">

    {!! csrf_field() !!}


    <div class="form-group">

        <label for="email" class="col-md-4 control-label">Email:</label>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control">
        </div>


    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Enviar Link</button>
        </div>
    </div>



</form>