@extends('Shared.layout')
@include('newNav')
@section('content')
    @if (1 != 0)
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Arena name</th>
                    <th scope="col">Client name</th>
                    <th scope="col">Client email</th>
                    <th scope="col">Date</th>
                    <th scope="col">TimeIn</th>
                    <th scope="col">TimeOut</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>


            <tbody class="table-group-divider">

                @foreach ($requests as $request)
                    <tr>
                        <th scope="row">{{ $request->arenaName }}</th>
                        <td>{{ $request->clientName }}</td>
                        <td>{{ $request->clientEmail }}</td>
                        <td>{{ $request->date }}</td>
                        <td>{{ $request->timeIn }}</td>
                        <td>{{ $request->timeOut }}</td>
                        <td>{{ $request->status }}</td>
                        @if ($request->status != 'confirmed')
                            @if ($request->status != 'rejected')
                                <td>
                                    <form action="{{ route('acceptReservation', $request->id) }}" method="POST">
                                        @csrf
                                        <button class=" btn btn-outline-primary btn-sm " type="submit">Confirm</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('rejectReservation', $request->id) }}" method="POST">
                                        @csrf
                                        <button class="rounded btn btn-outline-danger btn-sm" type="submit">Reject</button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
