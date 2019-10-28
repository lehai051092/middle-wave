@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('customers.insert')}}" enctype="multipart/form-data">
        @csrf
        <table class="table table-dark">
            <tr>
                <div class="form-group">
                    <td><label>Name</label></td>
                    <td><input type="text" name="name"></td>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <td><label>Age</label></td>
                    <td><input type="text" name="age"></td>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <td><label>Email</label></td>
                    <td><input type="email" name="email"></td>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <td><label>Image</label></td>
                    <td><input type="file" name="image"></td>
                </div>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
@endsection
