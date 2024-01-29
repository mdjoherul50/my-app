@extends('template.master')
@push('style')
    <style>

    </style>
@endpush

@section('content')
    {{-- Custome Code here --}}
    <section id="container">
        <div>
            <form action="{{ route('admin.create') }}" method="POST">
                @csrf
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Role(Requested)</th>
                        <th>Role(provide)</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($users as $user)
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <tr>
                            <td>{{ $user->name }}</td>
                            @if (!$user->approve)
                                <td>{{ $user->role->name }}</td>
                            @else
                                <td></td>
                            @endif
                            <td>
                                <select name="role_id" id="">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if ($user->role->id == $role->id) selected @endif>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button type="submit">Submit</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </section>
@endsection

@push('js')
    <script></script>
@endpush
