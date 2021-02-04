<div class="row">
    <div class="col-md-4">  
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="/storage/{{ $employee->avatar }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $employee->name." ".$employee->second_name." ".$employee->last_name." ".$employee->second_last_name }}</h3>
                    <p class="text-muted text-center">
                        @foreach($employee->roles as $roles)
                            {{ $roles->name." " }}
                        @endforeach
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>{{ $employee->document->acronym }}</b> <span class="float-right">{{ $employee->identification }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>@lang('Code')</b> <a class="float-right">{{ $employee->code }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('Status') }}</b>
                            @if($employee->deleted_at != '')
                                <span class="float-right">@lang('Desable')</span>
                            @else
                                <span class="float-right">@lang('Active')</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <b>@lang('From')</b> <a class="float-right" title="{{ substr($employee->created_at, 0,-9) }}">{{ \Carbon\Carbon::parse($employee->created_at)->diffForHumans() }}</a>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal-data" data-toggle="tab">@lang('Personal Data')</a></li>
                    <li class="nav-item"><a class="nav-link" href="#financials" data-toggle="tab">@lang('Financials')</a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>-->
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="personal-data">
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                                <!--<img class="img-circle img-bordered-sm" src="/storage/{{ $employee->avatar }}" alt="user image">
                                <span class="username">
                                    <a href="#">Jonathan Burke Jr.</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                </span>
                                <span class="description">Shared publicly - 7:30 PM today</span>-->
                                <ul class="ml-4 mb-0 fa-ul text-muted col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> 
                                                <strong>@lang('Address')</strong>: {{ $employee->address }}
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-globe"></i>
                                                </span> 
                                                <strong>@lang('Country')</strong>: {{ $employee->country->name }}
                                            </li>
                                        </div>
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-map-marker-alt"></i>
                                                </span> 
                                                <strong>@lang('State')</strong>: {{ $employee->state->name }}
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-map-marker-alt"></i>
                                                </span> 
                                                <strong>@lang('Municipality')</strong>: {{ $employee->municipality->name }}
                                            </li>
                                        </div>
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-map-marker-alt"></i>
                                                </span> 
                                                <strong>@lang('Parish')</strong>: {{ $employee->parish->name }}
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> 
                                                <strong>@lang('Phone')</strong>: {{ $employee->phone }}
                                            </li>
                                        </div>
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> 
                                                <strong>@lang('Phone')</strong>: {{ $employee->backup_phone }}
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-birthday-cake"></i>
                                                </span> 
                                                <strong>@lang('Birthday')</strong>: {{ $employee->birthday_date }}
                                            </li>
                                        </div>
                                        <div class="col-md-6">
                                            <li class="middle">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-venus-mars"></i>
                                                </span> 
                                                @if($employee->gender === 'F')
                                                    <strong>@lang('Gender')</strong>: <i class="fas fa-venus fa-lg" style="color:#e75480"  title="{{ __('Female') }}"></i>
                                                @else
                                                    <strong>@lang('Gender')</strong>: <i class="fas fa-mars fa-lg" style="color:#1e90ff" title="{{ __('Male') }}"></i>
                                                @endif
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-envelope"></i>
                                                </span> 
                                                {{ $employee->email }}
                                            </li>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                            <!-- /.user-block -->
                            <strong>@lang('Note')</strong>:
                            <p>
                                {{ $employee->note }}
                            </p>
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="financials">
                        <div class="post">
                            <div class="user-block">
                                <ul class="ml-4 mb-0 fa-ul text-muted col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-university"></i>
                                                </span> 
                                                <strong>@lang('Bank')</strong>: 
                                                @foreach($employee->banks as $bank)
                                                    {{ $bank->name.", " }}
                                                @endforeach
                                            </li>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <li class="middle pb-4">
                                                <span class="fa-li pl-2">
                                                    <i class="fas fa-lg fa-wallet"></i>
                                                </span> 
                                                <strong>@lang('Payment Gateway')</strong>: 
                                                @foreach($employee->paymentGateways as $wallet)
                                                    {{ $wallet->name.", " }}
                                                @endforeach
                                            </li>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <!--<div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>-->
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>