@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach ($users as $user)                            
                        <table class="table table-bordered border-primary mb-5 text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Today</th>
                                    <th><p class="mb-1">Yesterday</p><small>(1 Days)</small></th>
                                    <th>2 Days</th>
                                    <th>3 Days</th>
                                    <th>4 Days</th>
                                    <th>5 Days</th>
                                    <th><p class="mb-1">5+</p> Days</th>
                                    <th><p class="mb-1">10+</p> Days</th>
                                    <th><p class="mb-1">15+</p> Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuses as $key => $status)
                                    <tr class="text-center">
                                        @if ($key == 0)
                                            <td rowspan="5" width="150">
                                                <p class="mt-5">{{ $user->name }}</p>
                                                <h4>Orders</h4>
                                            </td>
                                        @endif

                                        <td>
                                            {{ $status }}
                                        </td>
                                   
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today())->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::yesterday())->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(2))->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(3))->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(4))->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(5))->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(6))->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(10))->count() }}</td>
                                        <td>{{ $user->orders->where('status', $status)->where('created_at', \Carbon\Carbon::today()->subDays(15))->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
