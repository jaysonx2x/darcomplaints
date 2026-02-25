

        <?php
            $is_admin_user = false;
            $is_sup_user = false;
            $is_student_user = false;
            switch (intval($this->session->userdata(SESS_USER_TYPE))) 
            {
                case USER_TYPE_ADMIN:
                    $is_admin_user = true;
                    break;
            }
        ?>

        <h4 class="mb-4 font-weight-bold">Dashboard Overview</h4>

        <?php if($is_admin_user) { ?>
            <div class="row">
                
                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('announcements'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-comments fa-2x text-success mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Announcements</h5>
                                    <p class="text-muted mb-0"><?php echo (isset($announcement_count) and $announcement_count) ? $announcement_count : '0' ?> announcements</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('complaints'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-exclamation-circle fa-2x text-danger mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Complaints</h5>
                                    <p class="text-muted mb-0">
                                        <?php echo (isset($complaint_count) && $complaint_count) ? $complaint_count : '0' ?> complaints
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('feedbacks'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-feed fa-2x text-info mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Feedbacks</h5>
                                    <p class="text-muted mb-0"><?php echo (isset($feedback_count) and $feedback_count) ? $feedback_count : '0' ?> feedbacks</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 mb-4">
                    <a href="<?php echo base_url('users'); ?>" class="text-decoration-none text-reset">
                        <div class="card p-4 d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-users fa-2x text-warning mr-3"></i>
                                <div>
                                    <h5 class="mb-1">Users</h5>
                                    <p class="text-muted mb-0"><?php echo (isset($user_count) and $user_count) ? $user_count : '0' ?> users</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- Complaint Analytics Section -->
            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <h4 class="mb-4 font-weight-bold">Complaint Analytics by Status</h4>
                    <button onclick="printAnalytics()" class="btn btn-primary no-print mb-4">
                        <i class="fa fa-print"></i> Print Analytics
                    </button>
                </div>
            </div>

            <div class="row">
                <!-- Status Overview Cards -->
                <div class="col-md-3 mb-4">
                    <div class="card p-4 border-left-warning">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-clock-o fa-3x text-warning mr-3"></i>
                            <div>
                                <h6 class="text-muted mb-1">Pending</h6>
                                <h3 class="mb-0 font-weight-bold"><?php echo isset($complaint_analytics['pending']) ? $complaint_analytics['pending'] : '0'; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card p-4 border-left-success">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle fa-3x text-success mr-3"></i>
                            <div>
                                <h6 class="text-muted mb-1">Resolved</h6>
                                <h3 class="mb-0 font-weight-bold"><?php echo isset($complaint_analytics['resolved']) ? $complaint_analytics['resolved'] : '0'; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card p-4 border-left-danger">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-times-circle fa-3x text-danger mr-3"></i>
                            <div>
                                <h6 class="text-muted mb-1">Rejected</h6>
                                <h3 class="mb-0 font-weight-bold"><?php echo isset($complaint_analytics['rejected']) ? $complaint_analytics['rejected'] : '0'; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card p-4 border-left-primary">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-list fa-3x text-primary mr-3"></i>
                            <div>
                                <h6 class="text-muted mb-1">Total Complaints</h6>
                                <h3 class="mb-0 font-weight-bold"><?php echo isset($complaint_analytics['total']) ? $complaint_analytics['total'] : '0'; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="row mt-4">
                <!-- Line Chart -->
                <div class="col-md-6 mb-4">
                    <div class="card p-4">
                        <h5 class="mb-3 font-weight-bold">Status Distribution</h5>
                        <div style="position: relative; height: 300px;">
                            <canvas id="statusLineChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-md-6 mb-4">
                    <div class="card p-4">
                        <h5 class="mb-3 font-weight-bold">Status Breakdown</h5>
                        <div style="position: relative; height: 300px;">
                            <canvas id="statusPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Trends Chart -->
            <div class="row mt-4">
                <div class="col-md-12 mb-4">
                    <div class="card p-4">
                        <h5 class="mb-3 font-weight-bold">6-Month Complaint Trends</h5>
                        <div style="position: relative; height: 350px;">
                            <canvas id="monthlyTrendsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Wait for Chart.js to load
                window.addEventListener('load', function() {
                    // Prepare data for charts
                    var complaintAnalytics = {
                        pending: <?php echo isset($complaint_analytics['pending']) ? $complaint_analytics['pending'] : 0; ?>,
                        resolved: <?php echo isset($complaint_analytics['resolved']) ? $complaint_analytics['resolved'] : 0; ?>,
                        rejected: <?php echo isset($complaint_analytics['rejected']) ? $complaint_analytics['rejected'] : 0; ?>
                    };

                    var monthlyTrends = <?php echo json_encode(isset($monthly_trends) ? $monthly_trends : array()); ?>;

                // Status Line Chart (Distribution)
                var ctxLine = document.getElementById('statusLineChart').getContext('2d');
                var statusLineChart = new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: ['Pending', 'Resolved', 'Rejected'],
                        datasets: [{
                            label: 'Number of Complaints',
                            data: [complaintAnalytics.pending, complaintAnalytics.resolved, complaintAnalytics.rejected],
                            borderColor: '#007bff',
                            backgroundColor: 'rgba(0, 123, 255, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: ['#ffc107', '#28a745', '#dc3545'],
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
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

                // Status Pie Chart (Breakdown)
                var ctxPie = document.getElementById('statusPieChart').getContext('2d');
                var statusPieChart = new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: ['Pending', 'Resolved', 'Rejected'],
                        datasets: [{
                            data: [complaintAnalytics.pending, complaintAnalytics.resolved, complaintAnalytics.rejected],
                            backgroundColor: ['#ffc107', '#28a745', '#dc3545'],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            }
                        }
                    }
                });

                // Monthly Trends Line Chart
                var monthLabels = monthlyTrends.map(function(item) { return item.month; });
                var pendingData = monthlyTrends.map(function(item) { return item.pending; });
                var resolvedData = monthlyTrends.map(function(item) { return item.resolved; });
                var rejectedData = monthlyTrends.map(function(item) { return item.rejected; });

                var ctxLine = document.getElementById('monthlyTrendsChart').getContext('2d');
                var monthlyTrendsChart = new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: monthLabels,
                        datasets: [
                            {
                                label: 'Pending',
                                data: pendingData,
                                borderColor: '#ffc107',
                                backgroundColor: 'rgba(255, 193, 7, 0.1)',
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Resolved',
                                data: resolvedData,
                                borderColor: '#28a745',
                                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Rejected',
                                data: rejectedData,
                                borderColor: '#dc3545',
                                backgroundColor: 'rgba(220, 53, 69, 0.1)',
                                tension: 0.4,
                                fill: true
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
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
                                position: 'top',
                            }
                        }
                    }
                });
                }); // End window.addEventListener
                
                // Print Analytics Function
                function printAnalytics() {
                    window.print();
                }
            </script>

        <?php } ?>