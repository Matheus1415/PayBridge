@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@vite('resources/assets/vendor/libs/jquery/jquery.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
<div class="row gy-6">
  <!-- Congratulations card -->
  <div class="col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body text-nowrap">
        <h5 class="card-title mb-0 flex-wrap text-nowrap">Congratulations Norris! 🎉</h5>
        <p class="mb-2">Best seller of the month</p>
        <h4 class="text-primary mb-0">$42.8k</h4>
        <p class="mb-2">78% of target 🚀</p>
        <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
      </div>
      <img src="{{asset('assets/img/illustrations/trophy.png')}}" class="position-absolute bottom-0 end-0 me-5 mb-5" width="83" alt="view sales">
    </div>
  </div>
  <!--/ Congratulations card -->

  <!-- Transactions -->
  <div class="col-lg-8">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Transactions</h5>
          <div class="dropdown">
            <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ri-more-2-line ri-24px"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
              <a class="dropdown-item" href="javascript:void(0);">Share</a>
              <a class="dropdown-item" href="javascript:void(0);">Update</a>
            </div>
          </div>
        </div>
        <p class="small mb-0"><span class="h6 mb-0">Total 48.5% Growth</span> 😎 this month</p>
      </div>
      <div class="card-body pt-lg-10">
        <div class="row g-6">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow-xs">
                  <i class="ri-pie-chart-2-line ri-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <p class="mb-0">Sales</p>
                <h5 class="mb-0">245k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow-xs">
                  <i class="ri-group-line ri-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <p class="mb-0">Customers</p>
                <h5 class="mb-0">12.5k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-warning rounded shadow-xs">
                  <i class="ri-macbook-line ri-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <p class="mb-0">Product</p>
                <h5 class="mb-0">1.54k</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-info rounded shadow-xs">
                  <i class="ri-money-dollar-circle-line ri-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <p class="mb-0">Revenue</p>
                <h5 class="mb-0">$88k</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transactions -->
</div>

@endsection
