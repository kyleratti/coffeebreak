<div class="alert alert-danger">
    <h4 class="alert-heading">An error has occurred</h4>
    <ul>
        @foreach ($errors->all() as $strError)
            <li>{{ $strError }}</li>
        @endforeach
    </ul>
</div>
