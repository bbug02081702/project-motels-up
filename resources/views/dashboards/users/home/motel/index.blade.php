<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="/content/site.min.css" />
</head>
<body>
         <!-- Page Wrapper -->
         <div class="page-wrapper job-wrapper">
            <!-- Page Content -->
            <div class="content container">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Motels</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Trang chu</a></li>
                                <li class="breadcrumb-item active">Motels</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="job-info job-widget">
                            <h3 class="job-title">{{ $motels[0]->title }}</h3>
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <span class="job-dept">Gia: {{ $motels[0]->price}} vnd/thang</span>
                            <ul class="job-post-det">
                                <li><i class="fa fa-user-o"></i> Nguoi dang: <span class="text-blue">demo user</span></li>
                                <li><i class="fa fa-eye"></i> Luot xem: <span class="text-blue">
                                    <!-- check view post -->
                                    @if (!empty($motels[0]->count_view))
                                        {{ $motels[0]->count_view }}
                                        @else
                                        0
                                    @endif
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="job-content job-widget">
                            <div class="job-desc-title"><h4>Motels Description</h4></div>
                            <div class="job-description">
                                <p>{{ $motels[0]->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Wrapper -->
</body>
</html>