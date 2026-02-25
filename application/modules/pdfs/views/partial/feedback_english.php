

        <?php
            $is_isset_report = (isset($report) and $report);
            
            $cb_checked     = base_url('assets/img/cb-check.png');
            $cb_unchecked   = base_url('assets/img/cb-uncheck.png');
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
                border: 0.2px solid #e9ecef;
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
            .font-size-10pt {
                font-size: 10pt;
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

                <thead>
                    
                    <tr>
                        <td style="width: 100%;" colspan="10" class="text-center">
                            <?php if(DAR_LOGO_LINK) { ?>
                                <img src="<?php echo  base_url(DAR_LOGO_LINK); ?>" style="width: 50px" /> 
                            <?php } ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 100%;" colspan="10" class="text-center">
                            <label class="font-size-10pt font-weight-bold">DEPARTMENT OF AGRARIAN REFORM</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>

                </thead>

                <tbody>
                    
                    <tr>
                        <td colspan="10" width="100%" class="text-center font-weight-bold font-size-11pt" 
                            ><label>HELP US SERVE YOU BETTER!</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="10" width="100%" class=" font-size-8pt" 
                            ><label style="text-align: center;">This Client Satisfaction Measurement (CSM) tracks the customer experience of government offices. Your feedback on your <u>recently concluded transaction</u> will help this office provide a better service. Personal information shared will remain be kept confidential and you always have the option to not answer this form.</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>

                    <tr>
                        <td width="12%" class="font-size-8pt">
                            <label>Client type:</label>
                        </td>
                        <td width="10%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> Citizen
                        </td>
                        <td width="13%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> Student
                        </td>
                        <td colspan="2" width="38%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> Government (Employee or another agency)
                        </td>
                        <td width="12%" class="font-size-8pt">
                            <label>Age Group:</label>
                        </td>
                        <td width="15%" rowspan="7" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 30 and below <br>
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 31-40 <br>
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 41-50 <br>
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 51-60 <br>
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 5) ? $cb_checked : $cb_unchecked; ?>" /> 61 and above <br>
                        </td>
                    </tr>
                    <tr>
                        <td width="12%" class="font-size-8pt">
                        </td>
                        <td width="10%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> Farmer
                        </td>
                        <td width="13%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 5) ? $cb_checked : $cb_unchecked; ?>" /> Landowner
                        </td>
                        <td colspan="2" width="45%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 6) ? $cb_checked : $cb_unchecked; ?>" /> Others:
                        </td>
                    </tr>
                    <tr><td colspan="10" width="100%"></td></tr>
                    <tr>
                        <td width="8%" class="font-size-8pt">
                            <label>Date:</label>
                        </td>
                        <td width="15%" class=" font-size-8pt" style="border-bottom: 1px solid gray;"
                            ><label><?php echo ($is_isset_report) ? fn_format_date($report['feedback_date'], 'm/d/Y') : ''; ?></label>
                        </td>
                        <td width="6%" class="font-size-8pt">
                            <label>Sex:</label>
                        </td>
                        <td width="8%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sex']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> Male
                        </td>
                        <td width="10%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sex']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> Female
                        </td>
                    </tr>
                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td width="19%" class="font-size-8pt">
                            <label>Region of Concern:</label>
                        </td>
                        <td width="20%" class=" font-size-8pt" style="border-bottom: 1px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['region'] : ''; ?></label>
                        </td>
                        <td width="16%" class="font-size-8pt">
                            <label>Service Availed:</label>
                        </td>
                        <td width="30%" class=" font-size-8pt" style="border-bottom: 1px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['service_availed'] : ''; ?></label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>Time In:</label>
                        </td>
                        <td width="20%" class=" font-size-8pt" style="border-bottom: 1px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['time_in'] : ''; ?></label>
                        </td>
                        <td width="11%" class="font-size-8pt">
                            <label>Time Out:</label>
                        </td>
                        <td width="20%" class=" font-size-8pt" style="border-bottom: 1px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['time_out'] : ''; ?></label>
                        </td>
                    </tr>

                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td colspan="10" width="100%" class=" font-size-8pt" 
                            ><label>INSTRUCTIONS: <b>Check mark </b>(✔) your answer to the Citizen's Charter (CC) questions. The Citizen's Charter is an official document that reflects the services of a government agency/office including its requirements, fees, and processing times among others.</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>CC1</label>
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label>Which of the following best describes your awareness of a CC?</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 1. I know what a CC is and I saw this office’s CC.</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 2. I know what a CC is but I did NOT see this office’s CC.</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 3. I learned of the CC only when I saw this office’s CC.</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 4. I do not know what a CC is and did not see one in this office.</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>CC2</label>
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label>If aware of CC (asnwered 1-3 in CC1), would you say that the CC of this office was...?</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 1. Easy to see</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 4. Not visible at all</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 2. Somewhat easy to see</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 5) ? $cb_checked : $cb_unchecked; ?>" /> 5. N/A</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 3. Difficult to see</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>CC3</label>
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label>If aware of CC (answered 1-3 in CC1), how much did the CC help you in your transaction?</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 1. Helped very much</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 3. Did not help</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 2. Somewhat helped</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 4. N/A</label>
                        </td>
                    </tr>

                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td colspan="10" width="100%" class=" font-size-8pt" 
                            ><label>INSTRUCTIONS: For SQD 0-8, please put a <b>check mark</b> (✔) on the column that best corresponds to your answer.</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="10" width="100%"
                            ><table class="font-size-8pt">
                                <tr>
                                    <td class="text-center border-gray" rowspan="2" style="width: 40%; vertical-align: middle"></td>
                                    <th class="text-center border-gray" style="width: 10%;"><img src="<?php echo base_url('assets/img/sad.png'); ?>" style="width: 20px;" /></th>
                                    <th class="text-center border-gray" style="width: 10%;"><img src="<?php echo base_url('assets/img/indifferent.png'); ?>" style="width: 20px;" /></th>
                                    <th class="text-center border-gray" style="width: 10%;"><img src="<?php echo base_url('assets/img/emoticon.png'); ?>" style="width: 20px;" /></th>
                                    <th class="text-center border-gray" style="width: 10%;"><img src="<?php echo base_url('assets/img/happy-face.png'); ?>" style="width: 20px;" /></th>
                                    <th class="text-center border-gray" style="width: 10%;"><img src="<?php echo base_url('assets/img/happy.png'); ?>" style="width: 20px;" /></th>
                                    <th class="text-center border-gray" style="width: 10%;"><img src="<?php echo base_url('assets/img/na.png'); ?>" style="width: 20px;" /></th>
                                </tr>
                                <tr>
                                    <th class="text-center border-bottom-gray border-right-gray">Strongly Disagree</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Disagree</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Neither</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Agree</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Strongly Agree</th>
                                    <th class="text-center border-bottom-gray border-right-gray">Not <br> Applicable</th>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD0.</b> I am satisfied with the service I availed.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD1.</b> I spent a reasonable amount of time for my transaction.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD2.</b> The office followed the transaction's requirements and steps based on the information provided.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD3.</b> The steps (including payment) I needed to do for my transaction were easy and simple.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD4.</b> I easily found information about my transaction from the office or its website.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD5.</b> I paid a reasonable amount of fees for my transaction.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD6.</b> I feel the office was fair to everyone, or "walang palakasan", during my transaction.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD7.</b> I was treated courteously by the staff, and (if asked for help) the staff was helpful.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD8.</b> I got what I needed from the government office, or (I denied) denial or request was sufficiently explained to me.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd8']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd8']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd8']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd8']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd8']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd8']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td colspan="12" width="100%" class="font-size-8pt font-weight-bold"
                            ><label>Suggestions on how we can further improve our services (optional):</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="12" width="100%" class="font-size-8pt"
                            ><label><?php echo ($is_isset_report) ? $report['suggestions'] : ''; ?></label>
                        </td>
                    </tr>

                </tbody>

            </table>

        <?php } else { ?>

            <div style="width: 100%; text-align: center; color: green;">
                <h1>Cannot load report.</h1>
            </div>

        <?php } ?>