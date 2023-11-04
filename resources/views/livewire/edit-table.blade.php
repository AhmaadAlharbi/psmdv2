@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Edit
				Tables</span>
		</div>
	</div>
	<div class="d-flex my-xl-auto right-content">
		<div class="pe-1 mb-xl-0">
			<button type="button" class="btn btn-info btn-icon me-2 btn-b"><i
					class="mdi mdi-filter-variant"></i></button>
		</div>
		<div class="pe-1 mb-xl-0">
			<button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
		</div>
		<div class="pe-1 mb-xl-0">
			<button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
		</div>
		<div class="mb-xl-0">
			<div class="btn-group dropdown">
				<button type="button" class="btn btn-primary">14 Aug 2019</button>
				<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
					id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuDate"
					x-placement="bottom-end">
					<a class="dropdown-item" href="javascript:void(0);">2015</a>
					<a class="dropdown-item" href="javascript:void(0);">2016</a>
					<a class="dropdown-item" href="javascript:void(0);">2017</a>
					<a class="dropdown-item" href="javascript:void(0);">2018</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumb -->

<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Basic Edit Table</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
						<thead>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Position</th>
								<th>Start date</th>
								<th>Salary</th>
								<th>E-mail</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Bella</td>
								<td>Chloe</td>
								<td>System Developer</td>
								<td>2018/03/12</td>
								<td>$654,765</td>
								<td>b.Chloe@datatables.net</td>
							</tr>
							<tr>
								<td>Donna</td>
								<td>Bond</td>
								<td>Account Manager</td>
								<td>2012/02/21</td>
								<td>$543,654</td>
								<td>d.bond@datatables.net</td>
							</tr>
							<tr>
								<td>Harry</td>
								<td>Carr</td>
								<td>Technical Manager</td>
								<td>20011/02/87</td>
								<td>$86,000</td>
								<td>h.carr@datatables.net</td>
							</tr>
							<tr>
								<td>Lucas</td>
								<td>Dyer</td>
								<td>Javascript Developer</td>
								<td>2014/08/23</td>
								<td>$456,123</td>
								<td>l.dyer@datatables.net</td>
							</tr>
							<tr>
								<td>Karen</td>
								<td>Hill</td>
								<td>Sales Manager</td>
								<td>2010/7/14</td>
								<td>$432,230</td>
								<td>k.hill@datatables.net</td>
							</tr>
							<tr>
								<td>Dominic</td>
								<td>Hudson</td>
								<td>Sales Assistant</td>
								<td>2015/10/16</td>
								<td>$654,300</td>
								<td>d.hudson@datatables.net</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Add New Row with Edit Table</h3>
			</div>
			<div class="card-body">
				<button id="table2-new-row-button" class="btn btn-primary mb-4"> Add New Row</button>
				<div class="table-responsive">
					<table class="table table-bordered border text-nowrap mb-0" id="new-edit">
						<thead>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Position</th>
								<th>Start date</th>
								<th>Salary</th>
								<th>E-mail</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Bella</td>
								<td>Chloe</td>
								<td>System Developer</td>
								<td>2018/03/12</td>
								<td>$654,765</td>
								<td>b.Chloe@datatables.net</td>
							</tr>
							<tr>
								<td>Donna</td>
								<td>Bond</td>
								<td>Account Manager</td>
								<td>2012/02/21</td>
								<td>$543,654</td>
								<td>d.bond@datatables.net</td>
							</tr>
							<tr>
								<td>Harry</td>
								<td>Carr</td>
								<td>Technical Manager</td>
								<td>20011/02/87</td>
								<td>$86,000</td>
								<td>h.carr@datatables.net</td>
							</tr>
							<tr>
								<td>Lucas</td>
								<td>Dyer</td>
								<td>Javascript Developer</td>
								<td>2014/08/23</td>
								<td>$456,123</td>
								<td>l.dyer@datatables.net</td>
							</tr>
							<tr>
								<td>Karen</td>
								<td>Hill</td>
								<td>Sales Manager</td>
								<td>2010/7/14</td>
								<td>$432,230</td>
								<td>k.hill@datatables.net</td>
							</tr>
							<tr>
								<td>Dominic</td>
								<td>Hudson</td>
								<td>Sales Assistant</td>
								<td>2015/10/16</td>
								<td>$654,300</td>
								<td>d.hudson@datatables.net</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Removed action label, and only some columns are editable</h3>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered border text-nowrap mb-0" id="removecolumns-edit">
						<thead>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Position</th>
								<th>Start date</th>
								<th>Salary</th>
								<th>E-mail</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Bella</td>
								<td>Chloe</td>
								<td>System Developer</td>
								<td>2018/03/12</td>
								<td>$654,765</td>
								<td>b.Chloe@datatables.net</td>
							</tr>
							<tr>
								<td>Donna</td>
								<td>Bond</td>
								<td>Account Manager</td>
								<td>2012/02/21</td>
								<td>$543,654</td>
								<td>d.bond@datatables.net</td>
							</tr>
							<tr>
								<td>Harry</td>
								<td>Carr</td>
								<td>Technical Manager</td>
								<td>20011/02/87</td>
								<td>$86,000</td>
								<td>h.carr@datatables.net</td>
							</tr>
							<tr>
								<td>Lucas</td>
								<td>Dyer</td>
								<td>Javascript Developer</td>
								<td>2014/08/23</td>
								<td>$456,123</td>
								<td>l.dyer@datatables.net</td>
							</tr>
							<tr>
								<td>Karen</td>
								<td>Hill</td>
								<td>Sales Manager</td>
								<td>2010/7/14</td>
								<td>$432,230</td>
								<td>k.hill@datatables.net</td>
							</tr>
							<tr>
								<td>Dominic</td>
								<td>Hudson</td>
								<td>Sales Assistant</td>
								<td>2015/10/16</td>
								<td>$654,300</td>
								<td>d.hudson@datatables.net</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

@endsection

@section('scripts')

<!-- INTERNAL Edit-Table JS -->
<script src="{{asset('assets/plugins/edit-table/bst-edittable.js')}}"></script>
<script src="{{asset('assets/plugins/edit-table/edit-table.js')}}"></script>

@endsection