@extends('layouts.user_type.auth')

@section('content')
<div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
  <div class="col-auto my-auto p-3">
    <div class="h-100 font-weight-bolder mb-0" style="display: flex; justify-content: space-start;">
      <h5 class="mt-2 mb-3"> Total Transactions: </h5>
      <p class="h-100 font-weight-bolder mb-0 mt-1" style="font-size: 25px; margin-left:6px;"> ${{$grantTotal}}</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Completed</p>
              <h5 class="font-weight-bolder mb-0">
                ${{$completed}}
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
              <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending</p>
              <h5 class="font-weight-bolder mb-0">
                ${{$pending}}
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
              <i class="ni ni-bold-left text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Failed</p>
              <h5 class="font-weight-bolder mb-0">
                ${{$failed}}
                <span class="text-danger text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
              <i class="ni ni-fat-remove text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Declined</p>
              <h5 class="font-weight-bolder mb-0">
                ${{$declined}}
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-sound-wave text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg-6 mb-lg-0 mb-4">
    <div class="card z-index-2">
      <div class="card-body p-3">
        <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
          <div class="chart">
            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
          </div>
        </div>
        <h6 class="ms-2 mt-4 mb-0"> Totals </h6>
        <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p>
        <div class="container border-radius-lg">
          <div class="row">
            <div class="col-3 py-3 ps-0">
              <div class="d-flex mb-2">
                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                <p class="text-xs mt-1 mb-0 font-weight-bold">Users</p>
              </div>
              <h4 class="font-weight-bolder" style="font-size: 90%;">{{$totalUsers}}</h4>
              <div class="progress w-75">
              <div class="progress-bar bg-secondary w-90" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-3 py-3 ps-0">
              <div class="d-flex mb-2">
                <i class="ni ni-circle-08 text-primary text-lg opacity-10" aria-hidden="true"></i>
                <p class="text-xs mt-1 mb-0 font-weight-bold">Customers</p>
              </div>
              <h4 class="font-weight-bolder" style="font-size: 90%;">{{$totalCustomers}}</h4>
              <div class="progress w-75">
                <div class="progress-bar bg-primary w-90" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-3 py-3 ps-0">
              <div class="d-flex mb-2">
                <i class="ni ni-check-bold text-success text-lg opacity-10" aria-hidden="true"></i>
                <p class="text-xs mt-1 mb-0 font-weight-bold">Suppliers</p>
              </div>
              <h4 class="font-weight-bolder" style="font-size: 90%;">{{$totalSupliers}}</h4>
              <div class="progress w-75">
              <div class="progress-bar bg-success w-90" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-3 py-3 ps-0">
              <div class="d-flex mb-2">
                <i class="ni ni-bullet-list-67 text-danger text-lg opacity-10" aria-hidden="true"></i>
                <p class="text-xs mt-1 mb-0 font-weight-bold">Products</p>
              </div>
              <h4 class="font-weight-bolder" style="font-size: 90%;">{{$totalProducts}}</h4>
              <div class="progress w-75">
              <div class="progress-bar bg-danger w-90" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card z-index-2">
      <div class="card-header pb-0">
        <h6>Sales overview</h6>
        <p class="text-sm">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">4% more</span> in 2021
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('dashboard')
<script>
  window.onload = function() {
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  }
</script>
@endpush