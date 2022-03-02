@extends('layouts.master')

@section('title', 'Gyms')


@section('content')

    <div class="w-75 mx-auto pt-3 d-flex justify-content-end">
        <a href="{{ route('gyms.create') }}" class="btn btn-success my-3">Add New Gym</a>
    </div>

    <table class="w-75 mx-auto text-center table-bordered border-2 table-striped ">

        <thead>
            <tr>
                <th>Name</th>
                <th>Cover Image</th>
                <th>City Name</th>

                <th>Controllers</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($gyms as $gym)
                <tr>
                    <th>{{ $gym->name }}</th>

                    <th>
                        <img src="{{ url('imgs/gym/' . $gym->cover_img) }} " width="80" height="80" alt="" />
                    </th>

                    <th>
                        {{ $gym->city_id }}
                    </th>


                    <th class="d-flex justify-content-around py-4">
                        <a href="{{ route('gyms.edit', $gym->id) }}" class="btn btn-primary">Update</a>

                        <form action="{{ route('gyms.destroy', $gym->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">
                                Delete
                            </button>
                        </form>

                    </th>

                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
