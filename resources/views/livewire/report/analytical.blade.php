<div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <style>
       {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .header-container {
            background: linear-gradient(90deg, #3498db, #2980b9);
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;

        }

        .form-row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .choices {
            margin: 0 10px;
            display: flex;
            align-items: center;
        }

        .choices label {
            margin-right: 10px;
        }

        .form-control {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .generate {
            padding: 8px 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .generate:hover {
            background-color: #218838;
        }

        .box-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
            
        }

        .box-info li {
            display: flex;
            align-items: center;
           
            margin: 10px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .box-info li:hover {
            transform: translateY(-5px);
        }

        .box-info i {
            font-size: 30px;
            margin-right: 50px;
            color: #3498db;
        }

        .box-info h3 {
            margin: 0;
            font-size: 24px;
            color: #2c3e50;
        }

        .box-info p {
            margin: 0;
            color: #7f8c8d;
        }

        .chart-container {
            display: grid;
            gap: 20px;
            padding: 20px;
        }
        .data {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Media Queries for Responsive Design */
        @media (min-width: 1200px) {
            .chart-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media (min-width: 768px) and (max-width: 1199px) {
            .chart-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 767px) {
            .chart-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .form-row {
                flex-direction: column;
            }

            .choices {
                margin: 10px 0;
            }

            .box-info li {
                flex-direction: column;
                text-align: center;
            }

            .box-info i {
                margin-right: 0;
                margin-bottom: 10px;
            }
            @media (min-width: 768px) and (max-width: 1199px) {
                .form-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        }
    </style>

<body>
<div id="analytical" class="report-content">
<div class="header-container">

        <h2>Analytical Report</h2>
        <div class="form-row">
            <div class="choices">
                <label for="startDatePicker">Start Date:</label>
                <input type="date" id="startDatePicker" class="form-control">
            </div>
            <div class="choices">
                <label for="endDatePicker">End Date:</label>
                <input type="date" id="endDatePicker" class="form-control">
            </div>
            <button onclick="generateReport()" class="generate">Generate Report</button>
          
        </div>
</div>


    <ul class="box-info">
        <li>
            <i class="fas fa-fire-extinguisher"></i>
            <span class="text">
                @if($fires == 0)
                    <h3>{{ $fires }}</h3>
                    <p>Fire Extinguisher</p>
                @else
                    <h3>{{ $fires }}</h3>
                    <p>Fire Extinguisher{{ $fires != 1 ? 's' : '' }}</p>
                @endif
            </span>
        </li>
        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
						<li>

						<i class='bx bxs-group'></i>
						<span class="text">
							@php
								$totalRegularUsers = \App\Models\User::where('role', 'Student')->count() + \App\Models\User::where('role', 'Staff')->count();
							@endphp

							@if($totalRegularUsers == 0)
								<h3>{{ $totalRegularUsers }}</h3>
								<p>User</p>
							@else
								<h3>{{ $totalRegularUsers }}</h3>
								<p>User{{ $totalRegularUsers != 1 ? 's' : '' }}</p>
							@endif
						</span>
					</li>
       
                         <li>
							<i class='bx bxs-briefcase'></i>
						<span class="text">
							@php
								$totalEmployee = \App\Models\User::where('role', 'Head')->count() + \App\Models\User::where('role', 'Maintenance Personnel')->count();
							@endphp

							@if($totalEmployee == 0)
								<h3>{{ $totalEmployee }}</h3>
								<p>Employee</p>
							@else
								<h3>{{ $totalEmployee }}</h3>
								<p>Employee{{ $totalEmployee != 1 ? 's' : '' }}</p>
							@endif
						</span>
					</li>
					@endif
        <li>
            <i class="fas fa-fire-extinguisher"></i>
            <span class="features">
                <h3>2543</h3>
                <p>Expired Fire Extinguisher</p>
            </span>
        </li>
        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Head'))
								<li>
									<i class='bx bx-task' ></i>
									<span class="text">
									@if($tasks == 0)
										<h3>{{ $tasks }}</h3>
										<p>Task</p>
									@else
										<h3>{{ $tasks }}</h3>
										<p>Task{{ $tasks!= 1 ? 's' : '' }}</p>
									@endif
								</span>
								</li>
								
								<li>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
										<line x1="16" y1="2" x2="16" y2="6"></line>
										<line x1="8" y1="2" x2="8" y2="6"></line>
										<line x1="3" y1="10" x2="21" y2="10"></line>
										</svg>
									<span class="text">


									@if($requests == 0)
										<h3>{{ $requests }}</h3>
										<p>Request</p>
									@else
										<h3>{{ $requests }}</h3>
										<p>Request{{ $requests!= 1 ? 's' : '' }}</p>
									@endif
								</span>
								</li>
								@endif
    </ul>
    <div class="chart-container">
        <div class="data">
            <canvas id="existingChart"></canvas>
        </div>
        <div class="data">
            <canvas id="expiredChart"></canvas>
        </div>
        <div class="data">
            <canvas id="employeeChart"></canvas>
        </div>
        <div class="data">
            <canvas id="userChart"></canvas>
        </div>
        <div class="data">
            <canvas id="taskChart"></canvas>
        </div>
        <div class="data">
            <canvas id="requestChart"></canvas>
        </div>
    </div>
    </div>
    <script>
    function generateReport() {
        console.log("Report generated");
        updateCharts();
    }

    function updateCharts() {
        const fires = @json($fires);
        const regularUsers = @json($totalRegularUsers);
        const employeeCounts = @json($totalEmployee);
        const taskCounts = @json($tasks);
        const requestCounts = @json($requests);

        updateChart('existingChart', fires, 'Fire Extinguisher', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)');
        updateChart('expiredChart', 2543, 'Expired Fire Extinguisher', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 1)'); // Provide dummy data if needed
        updateChart('employeeChart', employeeCounts, 'Employee', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 1)');
        updateChart('userChart', regularUsers, 'User', 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 1)');
        updateChart('taskChart', taskCounts, 'Task', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 1)');
        updateChart('requestChart', requestCounts, 'Request', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)');
    }

    function updateChart(chartId, value, label, bgColor, borderColor) {
        const ctx = document.getElementById(chartId).getContext('2d');
        new Chart(ctx, {
            type: 'pie', // Corrected the chart type to 'bar'
            data: {
                labels: [label],
                datasets: [{
                    label: 'Count',
                    data: [value],
                    backgroundColor: bgColor,
                    borderColor: borderColor,
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }


</script>
</body>
</div>
