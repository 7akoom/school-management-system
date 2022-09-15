@extends('admin.admin_master')
@section('admin')
@php
 $employee_count =count(App\Models\User::where('usertype','employee')->get());
 $student_count =count(App\Models\User::where('usertype','student')->get());
 $user_count = count(App\Models\User::all());
 $subject_count = count(App\Models\SchoolSubject::all());

 $start_date = date('Y-m',strtotime("1 January 2022"));
		$end_date = date('Y-m',strtotime("now"));
    	$sdate = date('Y-m-d',strtotime("1 January 2022"));
    	$edate = date('Y-m-d',strtotime("now"));
    	 
    	$student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

    	$other_cost = App\Models\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount'); 

    	$emp_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

    	$total_cost = $other_cost+$emp_salary;
    	$profit = $student_fee-$total_cost; 
 
 @endphp

  <div class="content-wrapper">
	  <div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<center>
	<div class="box-body">							
		<div class="icon bg-primary-light rounded w-60 h-60">
			<i class="text-primary mr-0 font-size-24 mdi mdi-account-group"></i>
		</div>
		<div >
			<p class="text-mute mt-20 mb-0 font-size-16">Total Users</p>
			<h3 class="text-white mb-0 font-weight-500">{{$user_count}} <small class="text-success"></small></h3>
		</div>
	</div>
</center>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
	<center>
	<div class="box-body">							
		<div class="icon bg-warning-light rounded w-60 h-60">
			<i class="text-warning mr-0 font-size-24 mdi  mdi-briefcase"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Employees</p>
			<h3 class="text-white mb-0 font-weight-500">{{$employee_count}} <small class="text-success"></small></h3>
		</div>
	</div>
</center>
</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
<center>

	<div class="box-body">							
		<div class="icon bg-info rounded w-60 h-60">
			<i class="text-info-light mr-0 font-size-24 mdi mdi-school"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Students</p>
			<h3 class="text-white mb-0 font-weight-500">{{$student_count}}<small class="text-danger"></small></h3>
		</div>
	</div>
	</center>

</div>
</div>
<div class="col-xl-3 col-6">
<div class="box overflow-hidden pull-up">
<center>

	<div class="box-body">							
		<div class="icon bg-danger-light rounded w-60 h-60">
			<i class="text-danger mr-0 font-size-24 mdi mdi-book-open-page-variant"></i>
		</div>
		<div>
			<p class="text-mute mt-20 mb-0 font-size-16">Subjects</p>
			<h3 class="text-white mb-0 font-weight-500">{{$subject_count}} <small class="text-danger"></small></h3>
		</div>
	</div>
	</center>
</div>
</div>
			</div>
			</div>
<div class="row">
	<div class="col-md-6">
		<div class="box overflow-hidden pull-up">
			<center>
				<div class="box-body">							
					<div class="icon bg-success-light rounded w-60 h-60">
						<i class="text-success mr-0 font-size-24 mdi mdi-alarm-panel"></i>
					</div>
					<div>
						<p class="text-mute mt-20 mb-0 font-size-16">Year Profit</p>
						<h3 class="text-white mb-0 font-weight-500">{{$profit}} <small class="text-danger"></small></h3>
					</div>
				</div>
			</center>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box overflow-hidden pull-up">
			<center>
				<div class="box-body">							
					<div class="icon bg-warning-light rounded w-60 h-60">
						<i class="text-warning mr-0 font-size-24 mdi mdi-cash-multiple "></i>
					</div>
					<div>
						<p class="text-mute mt-20 mb-0 font-size-16">Year Cost</p>
						<h3 class="text-white mb-0 font-weight-500">{{$total_cost}} <small class="text-danger"></small></h3>
					</div>
				</div>
			</center>
		</div>
	</div>
</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>

  @endsection