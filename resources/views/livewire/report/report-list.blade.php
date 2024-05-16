
<style>
    .container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding-top:10px;

}
.report-content {
  display: inline-block;
  padding: 20px;
  position: relative;

}
    .report-selection {
  position: flex;
  text-align: center;
  padding-top: 25px;
  background-color: #eee;
  width: auto;
  height: 7.5vh;
  border-radius: 10px;
  box-shadow: 0 10px 18px rgba(0, 0, 0, 0.5);
}

.report-button {
    position: flex;
  text-align: center;
  padding: 10px 20px;
  margin-top: 80px;
  width: auto;
  font-size: 16px;
  background: linear-gradient(to right, #3498db, #2e37a4);
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.floor-button:hover {
  background-color: #eee;
}
</style>
<div class="container">
        <div class="card">
            <div class="horizontal-scroll-container">
                <div class="report-selection">
                    <a href="#" class="report-button" data-report="fire-report" onclick="showReport(event, 'fire-report')">Fire Extinguisher Report</a>
                    <a href="#" class="report-button" data-report="task-report" onclick="showReport(event, 'task-report')">Task Report</a>
                    <a href="#" class="report-button" data-report="request-report" onclick="showReport(event, 'request-report')">Request Report</a>
                    <a href="#" class="report-button" data-report="analytical" onclick="showReport(event, 'analytical')">Analytical</a>
                </div>
                <br>
                <br>
               
                @livewire('report.analytical')
                @livewire('report.fire-report')
                @livewire('report.task-report')
                @livewire('report.request-report')
                

        </div>
        </div>
    </div>


    <script>
    // Function to show the selected report
    function showReport(event, reportId) {
        event.preventDefault(); // Prevent default anchor tag behavior

        // Hide all report contents
        const reportContents = document.getElementsByClassName('report-content');
        for (let i = 0; i < reportContents.length; i++) {
            reportContents[i].style.display = 'none';
        }

        // Show the selected report content
        document.getElementById(reportId).style.display = 'block';

        // Store the selected report in local storage
        localStorage.setItem('selectedReport', reportId);

        // Emit Livewire event
        window.livewire.emit('reportSelected', reportId);
    }

    // Retrieve the selected report from local storage
    var selectedReport = localStorage.getItem('selectedReport');

    // If the selected report is not null or undefined, show it; otherwise, show the default report
    if (selectedReport) {
        showReport(new Event('click'), selectedReport);
    } else {
        showReport(new Event('click'), 'analytical');
    }
</script>
