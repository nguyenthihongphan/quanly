
@include('layout.header')
      <!-- partial:partials/_sidebar.html -->
      @include('layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">@lang('messages.account.welcome') Admin</h3>
                          </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">@lang('messages.dashboard.today_booking')</p>
                      <p class="fs-30 mb-2">4006</p>
                      <p>10.00% (30 @lang('messages.dashboard.days'))</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">@lang('messages.dashboard.total')</p>
                      <p class="fs-30 mb-2">61344</p>
                      <p>22.00% (30 @lang('messages.dashboard.days'))</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">@lang('messages.dashboard.number')</p>
                      <p class="fs-30 mb-2">34040</p>
                      <p>2.00% (30 @lang('messages.dashboard.days'))</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">@lang('messages.dashboard.number_loading')</p>
                      <p class="fs-30 mb-2">47033</p>
                      <p>0.22% (30 @lang('messages.dashboard.days'))</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">@lang('messages.sidebar.order_detail')</p>
                  <p class="font-weight-500">@lang('messages.dashboard.content_detail')</p>
                  <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-4">
                      <p class="text-muted">@lang('messages.dashboard.order_value')</p>
                      <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                    </div>
                    <div class="mr-5 mt-4">
                      <p class="text-muted">Users</p>
                      <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                    </div>
                    <div class="mr-5 mt-4">
                      <p class="text-muted">@lang('messages.dashboard.Downloads')</p>
                      <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                    </div> 
                  </div>
                  <canvas id="order-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">@lang('messages.dashboard.sale_report')</p>
                
                 </div>
                  <p class="font-weight-500"></p>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="sales-chart"></canvas>
                </div>
              </div>
            </div>
          </div>       
        <!-- content-wrapper ends -->
@extends('layout.footer')
      </div>
    </div>   
  </div>
 
  <!-- End custom js for this page-->
</body>

</html>



