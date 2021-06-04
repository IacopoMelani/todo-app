<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="card card-new-task">
                                    <div class="card-header">New Task</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('todos.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">Tasks</div>

                                    <div class="card-body">
                                    <table class="table table-striped">
                                        @foreach ($todos as $todo)
                                            <tr>
                                                <td>
                                                    @if ($todo->is_complete)
                                                        <s>{{ $todo->title }}</s>
                                                    @else
                                                        {{ $todo->title }}
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    @if (! $todo->is_complete)
                                                        <form method="POST" action="{{ route('todos.update', $todo->id) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-primary">Complete</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>

                                        {{ $todos->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
