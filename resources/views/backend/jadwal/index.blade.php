@extends('backend.template')
@section('title')
Schedule
@endsection

@section('content')
<div class="row py-3">
    <div class="col-md-12">
        <div style="display:none" id="error" class="alert alert-danger">
            {{session('error')}}
        </div>
        <div style="display:none" id="success" class="alert alert-success">
            {{session('pesan')}}
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="float-left">
                    <h5 class="m-0">Schedule</h5>
                </div>
                <div class="float-right">
                    <a href="{{route('addschedule')}}" class="btn btn-round btn-outline-success btn-sm"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($bulan as $a)
                    <div class="col-md-3">
                        <div class="card card-success card-outline">
                            <div class="card-body">
                                <div class="float-left">
                                    <h5>{{bulantahun($a->filter)}}</h5>
                                </div>
                                <div class="float-right">
                                    <a href="{{route('detailbulan',encrypt($a->filter))}}" class="btn btn-outline-primary btn-sm">Show</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('validasi'))
	<script>
		$('#error').show();
		setInterval(function(){ $('#error').hide(); }, 5000);
	</script>
@endif
@if (session('pesan'))
	<script>
		$('#success').show();
		setInterval(function(){ $('#success').hide(); }, 5000);
	</script>
@endif
@endsection