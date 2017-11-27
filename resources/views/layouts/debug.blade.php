<div class="alert alert-warning">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h4 class="card-title">Authentication</h4>
            
            <p class="card-text">
                @if(Auth::check())
                    <h6 class="card-subtitle mb-2 text-muted">Logged in</h6>
                    <b>User:</b> {{ Auth::user()->display_name }}<br/>
                    <b>E-Mail:</b> {{ Auth::user()->email }}
                @else
                    <h6 class="card-subtitle mb-2 text-muted">Not logged in</h6>
                @endif
            </p>
        </div>
    </div>
</div>
