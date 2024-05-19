
<div class="content">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
					<li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
					<li class="breadcrumb-item active">History</li>
				</ul>
			</div>
		</div>
	</div>
	<livewire:flash-message.flash-message />
	<div class="row d-flex justify-content-center">
		<div class="col-sm-12">
			<div class="card card-table show-entire">
				<div class="card-body">
					<div class="page-table-header mb-2">
						<div class="row align-items-center">
							<div class="col">
								<div class="doctor-table-blk">
									<h3>History</h3>
                                    
								</div>
                                <button id="printhistory-button" class="btn btn-primary" style=" font-size: 12px; margin-top:20px; margin-left:91%;" onclick="printHistoryTable()">Print Report</button>
							</div>

						</div>
					</div>
					</div>
					<div class="table-responsive">
                    <div id="printhistory">
						<table class="table border-0 custom-table comman-table datatable mb-0">
                        
							<thead>
								<tr style="background: linear-gradient(to right, #3498db, #2e37a4); color:white;">
									<th style="width:10%; color:white;">Type</th>
									<th style="width:10%; color:white;">Name</th>
									<th style="width:10%;  color:white;">Serial Number</th>
									<th style="width:10%; color:white;">Location</th>
									<th style="width:10%; color:white;">Installation</th>
									<th style="width:10%; color:white;">Expiration</th>
									<th style="width:10%; color:white;">Description</th>
									<th style="width:10%; color:white;">Findings</th>
									<th style="width:10%%; color:white;">Status</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach ($history as $histories)
								<tr>
                                <td>{{  $histories->type  }}</td>
                                <td>{{ $histories->firename }}</td>
                                <td>{{  $histories->serial_number }}</td>
                                <td>{{ $histories->building . '/ ' . $histories->floor . '/' . $histories->room }}</td>
                                <td>{{  $histories->installation_date }}</td>
                                <td>{{  $histories->expiration_date }}</td>
								<td>{{  $histories->description }}</td>
								<td>{{  $histories->finding }}</td>
                                <td>{{  $histories->status }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
                    </div>
					</div>
				</div>
			</div>
		</div>
        <script>
        document.getElementById('printhistory-button').addEventListener('click', function () {
            printHistoryTable();
        });

        function printHistoryTable() {
            var printContents = document.getElementById('printhistory').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>