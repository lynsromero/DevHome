<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="col-sm-6 col-xl-3">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-th-large fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Total Projects</p>
          <h6 class="mb-0">{{ $totalProjects }}</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-globe fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Total Views</p>
          <h6 class="mb-0">{{ number_format($totalViews) }}</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-chart-line fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Today's Views</p>
          <h6 class="mb-0">{{ number_format($todaysViews) }}</h6>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
        <i class="fa fa-envelope fa-3x text-primary"></i>
        <div class="ms-3">
          <p class="mb-2">Today's Emails</p>
          <h6 class="mb-0">{{ $todaysEmails }}</h6>
        </div>
      </div>
    </div>
  </div>
</div>