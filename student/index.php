
<?php include 'header.php'; ?>


    <!-- ── DASHBOARD ── -->
    <div id="page-dashboard">

      <!-- STAT CARDS -->
      <div class="stats-grid">
        <div class="stat-card gold">
          <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
          <div class="stat-label">Total Days</div>
          <div class="stat-value">42</div>
         
        </div>
        <div class="stat-card green">
          <div class="stat-icon"><i class="bi bi-person-check"></i></div>
          <div class="stat-label">Days Present</div>
          <div class="stat-value">36</div>
         
        </div>
        <div class="stat-card red">
          <div class="stat-icon"><i class="bi bi-person-x"></i></div>
          <div class="stat-label">Days Absent</div>
          <div class="stat-value">6</div>
         
        </div>
        <div class="stat-card blue">
          <div class="stat-icon"><i class="bi bi-graph-up"></i></div>
          <div class="stat-label">Attendance %</div>
          <div class="stat-value">85%</div>
          
        </div>
      </div>

      <!-- ACTION ROW -->
      <div class="action-row d-flex">
        <button class="action-btn btn-ci" onclick="markAtt('checkin')">
          <i class="bi bi-box-arrow-in-right"></i>Check In
        </button>
        <button class="action-btn btn-co" onclick="markAtt('checkout')">
          <i class="bi bi-box-arrow-left"></i>Check Out
        </button>

       
      </div>

      <!-- TABLE -->
      <div class="sec-header">
        <div class="sec-title">Recent Attendance</div>
        <a href="#" class="view-all">View All →</a>
      </div>
      <div class="table-box">
        <div class="table-scroll">
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Duration</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="date-cell">20 May 2026</td>
                <td class="time-cell">Wednesday</td>
                <td>9:02 AM</td>
                <td>4:45 PM</td>
                <td>7h 43m</td>
                <td><span class="badge bp"><span class="dot dg"></span>Present</span></td>
              </tr>
              <tr>
                <td class="date-cell">19 May 2026</td>
                <td class="time-cell">Tuesday</td>
                <td>9:10 AM</td>
                <td>4:30 PM</td>
                <td>7h 20m</td>
                <td><span class="badge bp"><span class="dot dg"></span>Present</span></td>
              </tr>
              <tr>
                <td class="date-cell">18 May 2026</td>
                <td class="time-cell">Monday</td>
                <td>9:34 AM</td>
                <td>4:45 PM</td>
                <td>7h 11m</td>
                <td><span class="badge bl"><span class="dot dy"></span>Late</span></td>
              </tr>
              <tr>
                <td class="date-cell">17 May 2026</td>
                <td class="time-cell">Sunday</td>
                <td>—</td>
                <td>—</td>
                <td>—</td>
                <td><span class="badge ba"><span class="dot dr"></span>Holiday</span></td>
              </tr>
              <tr>
                <td class="date-cell">16 May 2026</td>
                <td class="time-cell">Saturday</td>
                <td>—</td>
                <td>—</td>
                <td>—</td>
                <td><span class="badge ba"><span class="dot dr"></span>Absent</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

     

    </div><!-- /dashboard -->

   

<?php include 'footer.php'; ?>