
@extends('layouts.admin-app')

@section('title', 'Laporan Personel')
@section('css')
    
@endsection
@section('content')
    <h2 class="text-center font-weight-bold">Laporan Personel</h2>
    <div class="card">
        <div class="card-body">
            
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
@endsection