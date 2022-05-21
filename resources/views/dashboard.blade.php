@extends('layouts.app')

@section('content')
@section('header')
    <x-page-header header="Dashboard"/>
@endsection
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings</h6>
                    <div>
                        Select Year :
                        <select class="form-select" aria-label="Default select example"
                                name="brand_id" id="year" onchange="getSelectedYearLine()">
                            @foreach ($years as $year)
                                @if($year == \Carbon\Carbon::now()->year)
                                    <option value="{{$year}}" selected>{{$year}}</option>
                                @else
                                    <option value="{{$year}}">{{$year}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area" id="chartContainerLine">
                        <canvas id="myLineChart"></canvas>
                    </div>
                    <br>
                </div>
            </div>
            <!-- Bar Chart -->
            <div class="card shadow mb-4 w-100">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Best-Selling Mobile Phones</h6>
                    <div>
                        Select Year :
                        <select class="form-select" aria-label="Default select example"
                                name="brand_id" id="year-bar" onchange="getSelectedYearBar()">
                            @foreach ($years as $year)
                                @if($year == \Carbon\Carbon::now()->year)
                                    <option value="{{$year}}" selected>{{$year}}</option>
                                @else
                                    <option value="{{$year}}">{{$year}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-bar" id="chartContainerBar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <br>
                </div>
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yearly Earnings</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4" id="chartContainerPie">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    window.onload = function(){
        getSelectedYearLine()
        getSelectedYearBar()
    }
    const monthlyTotalSales = JSON.parse('{!! json_encode($monthlyTotalSales) !!}');
    const totalPhoneSold = JSON.parse('{!! json_encode($totalPhoneSold) !!}');
    const yearlyTotalSales = JSON.parse('{!! json_encode($yearlyTotalSales) !!}');
</script>
@endsection



