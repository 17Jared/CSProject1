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
                    <th scope="col"></th>
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
                        @if ($request->status === 'confirmed')
                            <td>
                                <form action="{{ route('rejectReservation2', $request->id) }}" method="POST">
                                    @csrf
                                    <button class=" btn btn-outline-danger btn-sm " type="submit">Revert decision and
                                        cancel booking</button>
                                </form>
                            </td>
                        @endif
                        @if ($request->status === 'rejected')
                            <td>
                                <form action="{{ route('acceptReservation', $request->id) }}" method="POST">
                                    @csrf
                                    <button class=" btn btn-outline-primary btn-sm " type="submit">Revert decision and
                                        approve booking</button>
                                </form>
                            </td>
                        @endif


                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
