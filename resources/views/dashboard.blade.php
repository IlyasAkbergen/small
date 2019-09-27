@extends('layouts.app')
@section('head')
    <script>
        window.user = <?php echo json_encode($user) ?>;
        window.user.allow_add_question = <?php echo json_encode($allowAddQuestion) ?>
    </script>
    <style>
        .list-enter-active,
        .list-leave-active,
        .list-move {
          transition: 500ms cubic-bezier(0.59, 0.12, 0.34, 0.95);
          transition-property: opacity, transform;
        }

        .list-enter {
          opacity: 0;
          transform: translateX(50px) scaleY(0.5);
        }

        .list-enter-to {
          opacity: 1;
          transform: translateX(0) scaleY(1);
        }

        .list-leave-active {
          position: absolute;
        }

        .list-leave-to {
          opacity: 0;
          transform: scaleY(0);
          transform-origin: center top;
        }
        .component-fade-enter-active, .component-fade-leave-active {
          transition: opacity .3s ease;
        }
        .component-fade-enter, .component-fade-leave-to
        /* .component-fade-leave-active below version 2.1.8 */ {
          opacity: 0;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center" id="home">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @{{ dashboardHeader }}
                    <button class="btn btn-sm btn-primary float-right"
                                        key="refreshBtn"
                                        :disabled="loading"
                                        @click="getQuestions">Обновить</button>
                </div>

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
