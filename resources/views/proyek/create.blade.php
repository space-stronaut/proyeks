@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col"> --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Buat Proyek
                    </div>
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-primary">Go Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('proyek.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="pengembang_proyek" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="">Nama Proyek</label>
                            <input type="text" name="nama_proyek" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pengembangan</label>
                            <input type="date" name="tanggal_pengembangan" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Wilayah Pengembangan</label>
                            <input type="text" name="wilayah_pengembangan" id="" class="form-control">
                        </div>
                        {{-- <div class="divider"></div> --}}
                        <div class="form-group mt-3">
                            <button type="button" class="btn btn-info" id="repeatDivBtn" data-increment="1">Add More Input</button>
                        </div>
                        <div class="mb-3 input-group repeatDiv mt-3" id="repeatDiv">

                            {{-- <select name="id_bahan[]" id="bahan" class="form-control">
                                <option value="">Pilih Bahan...</option>
                                @forelse ($bahans as $item)
                                    <option value="{{ $item->id }}" data-stok="{{ $item->stok }}"">{{ $item->nama_bahan }} - @currency($item->harga_jual) - Stok : {{ $item->stok }}</option>
                                @empty
                                    
                                @endforelse
                            </select> --}}
                              <input type="text" class="form-control" name="step[]" placeholder="Step">
                              <input type="date" class="form-control" name="estimasi_tanggal_selesai[]">
                          </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>              
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
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