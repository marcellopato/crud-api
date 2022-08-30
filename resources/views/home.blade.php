@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan=6>{{ __('Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campanha as $camp)
                                    <tr>
                                        <td colspan=6> {{ $camp->name }} </td>
                                        <td> {{ $camp->desc }} </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                @foreach ($grupo as $grp)
                                    <tr>
                                        <td colspan=6> {{ $grp->name }} </td>
                                        @foreach ($grp->cidade as $grpd)
                                                <td> {{ $grpd->name }} </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
