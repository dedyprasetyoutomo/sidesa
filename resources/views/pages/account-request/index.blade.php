@extends('layouts.app')

@section('content')
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Permintaan Akun</h1>
                      
                    </div>
                    {{-- Table --}}
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div style="overflow-x: auto;">
                                    <div class="card-body">
                                        <table class="table table-bordered table-hovered" style="min-width: 100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        @if (count($users) < 1)
                                        <tbody>
                                            <tr>
                                                <td colspan="11">
                                                    <p class="pt-3 text-center">Tidak ada data</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @else
                                                <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <div class="d-flex" style="gap:10px">
                                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirmationApprove-{{ $item->id }}">
                                                            Setuju
                                                        </button>
                                                         <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationReject-{{ $item->id }}">
                                                            Tolak
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('pages.account-request.confirmation-approve')
                                            @include('pages.account-request.confirmation-reject')
                                            @endforeach
                                             
                                        </tbody>
                                        @endif
                                        
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
@endsection