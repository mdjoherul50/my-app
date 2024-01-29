@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
    {{-- Custome Code here --}}
    <section id="container">
        <form action="{{ route('user.update', $user->id) }}" method="post">
            @method('PATCH')
            @csrf
            <div>
                <label for="role">Role</label>
                <select name="role" id="">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Submit">
        </form>
    </section>
@endsection

@push('js')
    <script></script>
@endpush
