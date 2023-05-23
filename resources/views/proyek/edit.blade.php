@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                Edit Proyek
            </div>
            <div>
                <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('proyek.update', $proyek->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="pengembang_proyek" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="">Nama Proyek</label>
                    <input type="text" name="nama_proyek" id="" class="form-control" value="{{ $proyek->nama_proyek }}">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Pengembangan</label>
                    <input type="date" name="tanggal_pengembangan" id="" class="form-control" value="{{ $proyek->tanggal_pengembangan }}">
                </div>
                <div class="form-group">
                    <label for="">Wilayah Pengembangan</label>
                    <input type="text" name="wilayah_pengembangan" id="" class="form-control" value="{{ $proyek->wilayah_pengembangan }}">
                </div>
                
                <div class="form-group mt-3">
                    <label for="">Langkah Pengembangan</label>
                    
                    <div id="repeatDivContainer">
                        @foreach ($details as $langkah)
                        <div class="input-group repeatDiv mt-3">
                            <input type="text" class="form-control" name="step[]" placeholder="Langkah" value="{{ $langkah->step }}">
                            <input type="date" class="form-control" name="estimasi_tanggal_selesai[]" value="{{ $langkah->estimasi_tanggal_selesai }}">
                            {{-- <div class="input-group-append">
                                <button type="button" class="btn btn-danger removeDivBtn">Hapus</button>
                            </div> --}}
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>              
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

$("#repeatDivBtn").click(function () {

$newid = $(this).data("increment");
$repeatDiv = $("#repeatDiv").wrap('<div/>').parent().html();
$('#repeatDiv').unwrap();
$($repeatDiv).insertAfter($(".repeatDiv").last());
$(".repeatDiv").last().attr('id',   "repeatDiv" + '_' + $newid);
$("#repeatDiv" + '_' + $newid).append('<div class="input-group-append"><button type="button" class="btn btn-danger removeDivBtn" data-id="repeatDiv'+'_'+ $newid+'">Remove</button></div>');
$newid++;
$(this).data("increment", $newid);

});


$(document).on('click', '.removeDivBtn', function () {

$divId = $(this).data("id");
$("#"+$divId).remove();
$inc = $("#repeatDivBtn").data("increment");
$("#repeatDivBtn").data("increment", $inc-1);

});

});
</script>
@endsection