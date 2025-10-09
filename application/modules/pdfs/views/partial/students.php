

        <?php
            $is_isset_reports = (isset($reports) and $reports);
            $total = 0;
            $total_addon = 0;
        ?>

        <style>
            .border-bottom-gray {
                border-bottom: 0.2px solid #e9ecef;
            }
            .border-top-gray {
                border-top: 0.2px solid #e9ecef;
            }
            .border-right-gray {
                border-right: 0.2px solid #e9ecef;
            }
            .border-left-gray {
                border-left: 0.2px solid #e9ecef;
            }
            .border-gray {
                border: 0.2px 0.2px 0.2px 0.2px solid #e9ecef;
            }
            .table-th {
                font-weight: bold;
                background: #F7FAFC;
                font-size: 10pt; 
                letter-spacing: 1; 
                color: #3e5569;
            }
            .table-td {
                font-size: 10pt; 
                color: #3e5569;
            }
            .text-center {
                text-align: center;
            }
            .text-right {
                text-align: right;
            }
            .text-primary {
                color: #707cd2;
            }
            .text-success {
                color: #7ace4c;
            }
            .text-danger {
                color: #f33155;
            }
            .text-info {
                color: #2cabe3;
            }
            .text-default {
                color: #3e5569;
            }
            .font-size-9pt {
                font-size: 9pt;
            }
            .font-size-11pt {
                font-size: 11pt;
            }
            .font-weight-bold {
                font-weight: bold;
            }
        </style>

        <?php if (isset($status) and $status) { ?>

            <table border="0" style="width: 100%;"> 

                <?php /* NOTE HEADER START */ ?>
                <?php $this->load->view('pdfs/partial/header'); ?>
                <?php /* NOTE HEADER END */ ?>

                <tbody>

                    <tr><td colspan="12" width="100%"></td></tr>
                    <tr><td colspan="12" width="100%"></td></tr>

                    <tr>
                        <td colspan="3" width="20%"
                            ><span class="text-default">Year: <?php echo (isset($batch) and $batch) ? $batch : ''; ?></span>
                        </td>
                        <td colspan="9" width="80%"
                            ><span class="text-default">Company: <?php echo (isset($company) and $company) ? $company : ''; ?></span>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="12" width="100%"
                            ><table style="padding: 2px; font-size: 10pt;" >
                                <thead>
                                    <tr>
                                        <th width="5%" class="table-th border-bottom-gray border-top-gray border-right-gray border-left-gray  text-center">#</th>
                                        <th width="30%" class="table-th border-bottom-gray border-top-gray border-right-gray border-left-gray text-center">Name</th>
                                        <th width="15%" class="table-th border-bottom-gray border-top-gray border-right-gray border-left-gray text-center">Student ID</th>
                                        <th width="20%" class="table-th border-bottom-gray border-top-gray border-right-gray border-left-gray text-center">Assigned Company</th>
                                        <th width="15%" class="table-th border-bottom-gray border-top-gray border-right-gray border-left-gray text-center">Hours Rendered</th>
                                        <th width="15%" class="table-th border-bottom-gray border-top-gray border-right-gray border-left-gray text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(isset($reports) and count($reports)>0) 
                                        { 
                                            $ctr=0;
                                            foreach($reports as $report) 
                                            {
                                                $status = fn_format_student_status($report->status);
                                    ?>
                                                <tr>
                                                    <td class="table-td border-bottom-gray border-top-gray border-right-gray border-left-gray text-center"><?php echo ++$ctr; ?></td>
                                                    <td class="table-td border-bottom-gray border-top-gray border-right-gray border-left-gray"><?php echo $report->fullname . '<br>' . $report->username; ?></td>
                                                    <td class="table-td border-bottom-gray border-top-gray border-right-gray border-left-gray"><?php echo $report->id_no; ?></td>
                                                    <td class="table-td border-bottom-gray border-top-gray border-right-gray border-left-gray"><?php echo $report->company_name; ?></td>
                                                    <td class="table-td border-bottom-gray border-top-gray border-right-gray border-left-gray text-center"><?php echo $report->hours_rendered; ?></td>
                                                    <td class="table-td border-bottom-gray border-top-gray border-right-gray border-left-gray text-center"><?php echo $status->text; ?></td>
                                                </tr>
                                    <?php 
                                            }
                                        } else { 
                                    ?>
                                            <tr><td colspan="2" class="text-center table-td border-bottom-gray border-top-gray border-right-gray border-left-gray">No payments found.</td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <?php /* NOTE FOOTER START */ ?>
                    <?php // $this->load->view('pdfs/partial/footer'); ?>
                    <?php /* NOTE FOOTER END */ ?>

                </tbody>

            </table>

        <?php } else { ?>

            <div style="width: 100%; text-align: center; color: green;">
                <h1>Cannot load report.</h1>
            </div>

        <?php } ?>