

        <?php
            $is_isset_report = (isset($report) and $report);
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
            .text-success {
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
            .font-size-12pt {
                font-size: 12pt;
            }
            .font-size-13pt {
                font-size: 13pt;
            }
            .font-size-14pt {
                font-size: 14pt;
            }
            .font-size-15pt {
                font-size: 15pt;
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
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    <tr><td colspan="10" width="100%"></td></tr>

                    <tr>
                        <td colspan="3" width="35%" class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Control No.</label>
                        </td>
                        <td colspan="7" width="65%" class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['control_no'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Date</label>
                        </td>
                        <td colspan="7" class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['complaint_date'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="12" width="100%" class="border-bottom-gray border-top-gray font-size-15pt font-weight-bold">
                            <label>CLIENT INFORMATION</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" width="35%" class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Name</label>
                        </td>
                        <td colspan="7" width="65%" class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['fullname'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Email Address</label>
                        </td>
                        <td colspan="7"  class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['email'] : ''; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Address</label>
                        </td>
                        <td colspan="7"  class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['address'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"  class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Tel. No. / Mobile No.</label>
                        </td>
                        <td colspan="7" class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['phone1'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"  class="border-bottom-gray border-top-gray border-right-gray font-size-14pt">
                            <label>Valid Identification Card No.</label>
                        </td>
                        <td colspan="7"  class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['id_no'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="12" width="100%" class="border-bottom-gray border-top-gray font-size-14pt"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="12" width="100%" class="border-bottom-gray border-top-gray font-size-15pt font-weight-bold">
                            <label>ISSUES & CONCERNS/CASE NUMBER OR TITLE/REQUESTS, ETC.:</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="12" width="100%" class="border-bottom-gray border-top-gray font-size-14pt">
                            <label><?php echo ($is_isset_report) ? $report['concerns'] : ''; ?></label>
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