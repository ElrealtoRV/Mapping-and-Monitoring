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
<div id="task-report" class="report-content">
    <h2>Task Report</h2>
    <div class="filter-container">
        <label for="personnelFilter">Personnel:</label>
        <select id="personnelFilter" wire:model="selectedPersonnel">
            <option value="">All</option>
            @foreach($personnels as $personnel)
            <option value="{{ $personnel->id }}">{{ $personnel->first_name }} {{ $personnel->last_name }}</option>
            @endforeach
        </select>

        <label for="statusFilter">Status:</label>
        <select id="statusFilter" wire:model="selectedStatus">
            <option value="">All</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>

        <button id="printtask-button" class="btn btn-primary" onclick="printTaskTable()">Print Report</button>
    </div>

    <div class="table-responsive">
        <div id="printtask">
            <table class="table">
                <thead>
                    <tr style="background: linear-gradient(to right, #3498db, #2e37a4); color: white;">
                        <th style="width: 5%; color:white;">Task</th>
                        <th style="width: 5%; color:white;">Personnel</th>
                        <th style="width: 5%; color:white;">Due Date</th>
                        <!-- <th style="width:5%; color:white;">Date of Completion</th> -->
                        <th style="width: 5%; color:white;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->task_name ?: 'Empty' }}</td>
                        <td>{{ $task->user->first_name }} {{ $task->user->last_name }}</td>
                        <td>{{ $task->due_date }}</td>
                        <!-- <td>junes 26 2024</td> -->
                        <td>{{ $task->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<script>
        document.getElementById('printtask-button').addEventListener('click', function () {
            printTaskTable();
        });

        function printTaskTable() {
            var printContents = document.getElementById('printtask').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</div>




