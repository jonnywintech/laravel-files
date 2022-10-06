@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <div class="mb-3">
                            <div class="container">
                                <ul class="list-group list-group-numbered">
                                    @foreach ($folderList as $folder)
                                        <a href="{{ route('home.action', $folder) }}"
                                            class="list-group-item list-group-item-action">{{ $folder }}</a>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="container">
                                <ul class="list-group list-group-numbered">
                                    @foreach ($docFiles as $file)
                                        <a href="{{ route('home.download', $file) }}" target="_blank"
                                            class="list-group-item list-group-item-action">{{ $file }}</a>
                                    @endforeach
                                </ul>
                            </div>
                            <form action="{{ route('home.store') }}" method="PUT">
                                <label for="" class="form-label">Choose file</label>
                                <input type="file" class="form-control" name="file_save" id="file_save" placeholder=""
                                    aria-describedby="fileHelpId">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
