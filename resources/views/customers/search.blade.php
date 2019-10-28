@extends('layouts.app')
@section('content')
    <a href="" class="btn btn-primary">INSERT</a>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataSearch as $key => $customer)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->age}}</td>
                <td>{{$customer->email}}</td>
                <td><img src="{{asset("storage/images/".$customer->image)}}" width="50" height="30"></td>
                <td><a href="{{route('customers.delete', $customer->id)}}" class="btn btn-primary"
                       onclick="return confirm('You want delete {{$customer->name}} ???')">DELETE</a></td>
                <td><a href="{{route('customers.edit', $customer->id)}}" class="btn btn-primary">EDIT</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
