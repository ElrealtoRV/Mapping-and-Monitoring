<div>
<style> 
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f8f9fa;
}

.fire-report {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  padding: 20px;
}


.btn-group {
  display: flex;
  justify-content: center;
}

.btn {
  border-radius: 4px;
  font-size: 14px;
  padding: 6px 12px;
  transition: all 0.3s ease;
}

.btn-primary {
  background-color: #3498db;
  border-color: #3498db;
}

.btn-primary:hover {
  background-color: #2e8ece;
  border-color: #2e8ece;
}

.btn-danger {
  background-color: #e74c3c;
  border-color: #e74c3c;
}

.btn-danger:hover {
  background-color: #d62c1a;
  border-color: #d62c1a;
}

@media (max-width: 767px) {
  .table thead th {
    font-size: 14px;
    padding: 8px 12px;
  }

  .table tbody td {
    font-size: 12px;
    padding: 8px 12px;
  }

  .btn {
    font-size: 12px;
    padding: 4px 8px;
  }

  .btn-group {
    flex-direction: column;
    align-items: center;
  }

  .btn-group .btn {
    margin-bottom: 8px;
  }
}

</style>
<body>
<div id="request-report" class="report-content">
    <h2>Request Report</h2>
    <div class="filter-container">
    <label for="collegeFilter">College:</label>
    <select id="collegeFilter" wire:model="selectedCollege">
        <option value="">All</option>
        @foreach($colleges as $college)
            <option value="{{ $college }}">{{ $college }}</option>
        @endforeach
    </select>

    <!-- If you want to keep the print button, you can include it here -->
    <button id="printrequest-button" class="btn btn-primary" onclick="printRequestTable()">Print Report</button>
</div>


    <div class="table-responsive">
        <div id="printrequest">
            <table class="table">
                <thead>
                  <tr style="background: linear-gradient(to right, #3498db, #2e37a4); color: white;">
                  <th style="width: 5%">Transantion Id</th>
                  <th style="width: 5%">Requester</th>
									<th style="width: 5%">Id Number</th>
									<th style="width: 5%">College</th>
									<th style="width: 5%">Role</th>
									<th style="width: 5%">Request</th>
									<th style="width: 5%">Type</th>
									<th style="width: 5%">Building</th>
									<th style="width: 5%">Floor</th>
									<th style="width: 5%">Room</th>
                  <th style="width: 5%">Approve By</th>
									<th style="width: 5%">Requested At</th>
                   <th style="width: 5%">Approve At</th>
									<th style="width: 5%">Status</th>
								
                    </tr>
                </thead>
                <tbody>
                @foreach ($addRequests as $request)
								<tr>
                <td>{{ $request->transaction_id }}</td>
								<td>{{ $request->user->first_name . ' ' . $request->user->last_name }}</td>
								<td>{{ $request->user->idnum }}</td>
								<td>{{ $request->user->college }}</td>
								<td>{{ $request->user->role }}</td>
								<td>{{  $request->request }}</td>
								<td>{{  $request->type  }}</td>
								<td>{{  $request->building ?? 'No Building provided'}}</td>
								<td>{{  $request->floor  ?? 'No Floor provided' }}</td>
								<td>{{  $request->room  ?? 'No Building provided' }}</td>
                                <td>{{ $request->approver ?? 'Waiting For Approval' }}</td>
								<td>{{ 	$request->created_at->format('Y-m-d H:i:s') }}</td>
                                <<td>{{  $request->approved_at ?? 'Not Approved Yet' }}</td>
								<td>{{  $request->status  }}</td>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<script>
        document.getElementById('printrequest-button').addEventListener('click', function () {
            printRequestTable();
        });

        function printRequestTable() {
            var printContents = document.getElementById('printrequest').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</div>




