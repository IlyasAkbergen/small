@extends('layouts.app')
@section('head')
    <script>
        window.user = <?php echo json_encode($user) ?>
    </script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center" id="home">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@{{ dashboardHeader }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <questions-list></questions-list>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection
