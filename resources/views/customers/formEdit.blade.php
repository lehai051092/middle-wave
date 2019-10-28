@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('customers.update',$customer->id)}}">
        @csrf
        <table class="table table-dark">
            <tr>
                <div class="form-group">
                    <td><label>Name</label></td>
                    <td><input type="text" name="name" value="{{$customer->name}}"></td>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <td><label>Age</label></td>
                    <td><input type="text" name="age" value="{{$customer->age}}"></td>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <td><label>Email</label></td>
                    <td><input type="text" name="email" value="{{$customer->email}}"></td>
                </div>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
@endsection
