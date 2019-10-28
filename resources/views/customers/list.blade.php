@extends('layouts.app')
@section('content')

    <a href="{{route('customers.add')}}" class="btn btn-primary">INSERT</a>

    <form method="get" action="{{route('customers.search')}}">
        <table>
            <tr>
                <td colspan="3"></td>
                <td>
                    <input type="text" name="search">
                </td>
                <td>
                    <button type="submit">SEARCH</button>
                </td>
            </tr>
        </table>
    </form>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Email</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
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
    {{$customers->links()}}

@endsection
