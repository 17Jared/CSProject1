@extends('Shared.layout')
@include('newNav')
@section('content')
    @auth
        <table class="table table-dark">
            <tr>
                <th>Arena name</th>
                <th>Arena location</th>
                <th>Arena capacity</th>
                <th>Arena charges</th>
                <th>Arena email</th>
                <th>Arena phone</th>
            </tr>
            @foreach ($myArenas as $myArena)
                <tr>
                    <td>{{ $myArena->name }}</td>
                    <td>{{ $myArena->location }}</td>
                    <td>{{ $myArena->capacity }}</td>
                    <td>{{ $myArena->charges }}</td>
                    <td>{{ $myArena->email }}</td>
                    <td>{{ $myArena->phone }}</td>



                    <td><a type="button" class="btn btn-outline-primary"
                            href="{{ route('changeDetailsPage', $myArena->id) }}">Change details</a></td>
                    <td><!-- Delete Button -->
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Delete Arena
                        </button>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel" style="color: black">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="color: black">
                                        Are you sure you want to delete this item? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('deleteArena', $myArena->id) }}" type="button" class="btn btn-danger"
                                            id="confirmDelete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    @endauth
@endsection
