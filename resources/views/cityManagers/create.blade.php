@extends('layouts.master')

@section('title')
    City Managers
@endsection

@section('content')
    <div class="pt-4">

        <form class="mt-5 w-50 mx-auto" action="{{ route('cityManagers.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf

            {{-- manager name --}}
            <div class="mb-3">
                <label class="form-label"> Manager Name </label>
                <input type="text" name="name" class="form-control">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- email --}}
            <div class="mb-3">
                <label class="form-label"> Email </label>
                <input type="email" name="email" class="form-control">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- password --}}
            <div class="mb-3">
                <label class="form-label"> Password </label>
                <input type="password" name="password" class="form-control">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- national id --}}
            <div class="mb-3">
                <label class="form-label"> National ID </label>
                <input type="text" name="national_id" class="form-control"
                    onkeypress="return event.charCode > 47 && event.charCode < 58;" value="{{old('national_id','')}}"/>
            </div>
            @error('national_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label class="form-label">City</label>

                <select name="city_id" class="form-control">

                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->name }}</option>
                    @endforeach

                </select>
            </div>

            {{-- profile img --}}
            <div class="">
                <div class="w-100">
                    <label for="">Profile Image</label>
                    <input type="file" class="form-control-file w-100 bg-dark " name="img" aria-describedby="fileHelpId">
                    <small id="fileHelpId" class="form-text text-muted">only : png or jpg</small>
                </div>
            </div>
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-success py-2 px-4">Save</button>
            </div>
        </form>


    </div>
@endsection
