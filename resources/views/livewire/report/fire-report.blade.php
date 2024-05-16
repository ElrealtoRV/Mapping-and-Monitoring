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

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table thead th {
            background-color: #3498db;
            color: #fff;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 6px 6px 0 0;
        }

        .table tbody tr {
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table tbody td {
            padding: 12px 20px;
            vertical-align: middle;
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
        }

</style>
<body>
<div id="fire-report" class="report-content">
    <h2>Fire Extinguisher Report</h2>
    <div class="filter-container">
        <label for="departmentFilter">College / Building:</label>
        <select id="departmentFilter" wire:model="selectedDepartment">
            <option value="">All</option>
            @foreach($departments as $department)
                <option value="{{ $department }}">{{ $department }}</option>
            @endforeach
        </select>

        <label for="typeFilter">Type:</label>
        <select id="typeFilter" wire:model="selectedType">
            <option value="">All</option>
            @foreach($types as $type)
                <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
        </select>

        <label for="statusFilter">Status:</label>
        <select id="statusFilter" wire:model="selectedStatus">
            <option value="">All</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>

        <button id="printfire-button" class="btn btn-primary" onclick="printFireTable()">Print Report</button>
    </div>

    <div class="table-responsive">
        <div id="printfire">
            <table class="table">
                <thead>
                    <tr style="background: linear-gradient(to right, #3498db, #2e37a4); color: white;">
                        <th style="width: 5%; color:white;">Type</th>
                        <th style="width: 5%; color:white;">Name</th>
                        <th style="width: 5%; color:white;">Serial Number</th>
                        <th style="width:5%; color:white;">Building / college</th>
                        <th style="width:5%; color:white;">Floor</th>
                        <th style="width:5%; color:white;">Room</th>
                        <th style="width: 5%; color:white;">Installation Date</th>
                        <th style="width: 5%; color:white;">Expiration Date</th>
                        <th style="width: 5%; color:white;">Description</th>
                        <th style="width: 5%; color:white;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fire as $fire_fetch_list)
                    <tr>
                        <td>{{ $fire_fetch_list->type ?: 'Empty' }}</td>
                        <td>{{ $fire_fetch_list->firename ?: 'Empty' }}</td>
                        <td>{{ $fire_fetch_list->serial_number ?: 'Empty' }}</td>
                        <td>{{ $fire_fetch_list->building }}</td>
                        <td>{{ $fire_fetch_list->floor }}</td>
                        <td>{{ $fire_fetch_list->room }}</td>
                        <td>{{ $fire_fetch_list->installation_date }}</td>
                        <td>{{ $fire_fetch_list->expiration_date }}</td>
                        <td>{{ $fire_fetch_list->description }}</td>
                        <td>{{ $fire_fetch_list->status ?: 'Empty' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
        document.getElementById('printfire-button').addEventListener('click', function () {
            printFireTable();
        });

        function printFireTable() {
            var printContents = document.getElementById('printfire').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
<div>
