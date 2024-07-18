@extends('admin.layout.appadmin')
@section('content')
<br><br>
<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							
                        <div class="d-flex flex-column align-items-center text-center">
                        @if(isset($member->foto))
                        <img src="{{ asset('storage/fotos/' . $member->foto) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                         @else
                        <p>No photo available</p>
                         @endif
								<div class="mt-3">
									<h4>{{$member->name}}</h4>
									<p class="text-secondary mb-1">Full Stack Developer</p>
									<p class="text-muted font-size-sm">Role : {{$member->role}}</p>
								</div>
							</div>
							<hr class="my-4">
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
         <form method="POST" action="{{url('admin/member/profile/'.$member->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
			<input type="text" class="form-control @error('name') is-invalid @enderror" 
            name="name"  value="{{$member->name}}" required autocomplete="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
			<input type="text" class="form-control @error('email') is-invalid @enderror" 
            name="email" value="{{old('email', $member->email)}}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Old Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
			<input type="password" class="form-control @error('old_password') is-invalid @enderror" 
            name="old_password" >
            @error('old_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">New Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
		<input type="password" class="form-control @error('password') is-invalid @enderror"
         name="password">
         @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Confirm Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
		<input type="password"  class="form-control " name="password_confirmation">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Foto</h6>
								</div>
								<div class="col-sm-9 text-secondary">
		<input type="file" class="form-control" name="foto">
								</div>
							</div>
                            <div class="row mb-3">
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<button type="submit" class="btn btn-primary">
                                        {{__('Update Profile')}}
                                    </button>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="d-flex align-items-center mb-3">Project Status</h5>
									<p>Web Design</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Website Markup</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>One Page</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Mobile Template</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Backend API</p>
									<div class="progress" style="height: 5px">
										<div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>
                </form>
			</div>
		</div>
	</div>


@endsection