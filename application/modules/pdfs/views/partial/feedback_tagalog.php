

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
            .font-size-8pt {
                font-size: 8pt;
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
                            ><label>TULUNGAN MO KAMI MAS MAPABUTI ANG AMING PROSESO AT SERBISYO!</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="10" width="100%" class=" font-size-8pt" 
                            ><label >Ang Client Satisfaction Measurement (CSM) ay naglalayong masubaybayan ang karanasan ng taumbayan hingil sa kanilang pakikitransaksyon sa mga tanggapan ng gobyerno. 
                                Makatutulong ang iyong kasagutan ukol sa inyong naging karanasan sa <u>katatapos lamang na transaksyon,</u> upang mas mapabuti at lalong mapahusay ang aming serbisyo publiko.
                                Ang personal na impormasyon na inyong ibabahagi ay manatiling kumpidensyal. Maari rin piliin na hindi sagutan ang serbey na ito.</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>

                    <tr>
                        <td width="14%" class="font-size-8pt">
                            <label>Uri ng Kliyente:</label>
                        </td>
                        <td width="14%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> Mamamayan
                        </td>
                        <td width="11%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> Negosyo
                        </td>
                        <td width="13%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> Magsasaka
                        </td>
                        <td width="16%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> May-ari ng lupa
                        </td>
                        <td width="23%" style="font-size: 8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 5) ? $cb_checked : $cb_unchecked; ?>" /> Gobyerno (Emp o Ahensya)
                        </td>
                        <td width="13%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['client_type']) === 6) ? $cb_checked : $cb_unchecked; ?>" /> Iba pa
                        </td>
                    </tr>
                    <tr>
                        <td width="14%" class="font-size-8pt">
                            <label>Edad:</label>
                        </td>
                        <td width="15%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 30 and below <br>
                        </td>
                        <td width="11%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 31-40 <br>
                        </td>
                        <td width="11%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 41-50 <br>
                        </td>
                        <td width="11%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 51-60 <br>
                        </td>
                        <td width="15%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['age_group']) === 5) ? $cb_checked : $cb_unchecked; ?>" /> 61 and above <br>
                        </td>
                    </tr>
                    <tr>
                        <td width="8%" class="font-size-8pt">
                            <label>Petsa:</label>
                        </td>
                        <td width="12%" class=" font-size-8pt" style="border-bottom: 0.3px solid gray;"
                            ><label><?php echo ($is_isset_report) ? fn_format_date($report['feedback_date'], 'm/d/Y') : ''; ?></label>
                        </td>
                        <td width="13%" class="font-size-8pt text-right">
                            <label>Kasarian:</label>
                        </td>
                        <td width="9%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sex']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> Lalake
                        </td>
                        <td width="12%" class="font-size-8pt">
                            <img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sex']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> Babae
                        </td>
                        
                        <td width="10%" class="font-size-8pt">
                            <label>Time In:</label>
                        </td>
                        <td width="12%" class=" font-size-8pt" style="border-bottom: 0.3px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['time_in'] : ''; ?></label>
                        </td>
                        <td width="11%" class="font-size-8pt">
                            <label>Time Out:</label>
                        </td>
                        <td width="12%" class=" font-size-8pt" style="border-bottom: 0.3px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['time_out'] : ''; ?></label>
                        </td>
                        
                    </tr>
                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td width="23%" class="font-size-8pt">
                            <label>Rehiyon (Region of Concern):</label>
                        </td>
                        <td width="25%" class=" font-size-8pt" style="border-bottom: 0.3px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['region'] : ''; ?></label>
                        </td>
                        <td width="23%" class="font-size-8pt">
                            <label>Uri ng transaksyon o serbisyo:</label>
                        </td>
                        <td width="28%" class=" font-size-8pt" style="border-bottom: 0.3px solid gray;"
                            ><label><?php echo ($is_isset_report) ? $report['service_availed'] : ''; ?></label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="12" width="100%" ></td>
                    </tr>
                    
                    <tr>
                        <td colspan="10" width="100%" class=" font-size-8pt" 
                            ><label>PANUTO: Lagyan ng tsek (✔) ang iyong sagot sa mga sumusunod na katanungan tungkol sa Citizen's Charter (CC). Ito ay isang opisyal na dokumento sa naglalaman ng mga serbisyo sa isang ahensya/opisina ng gobyerno, makikita rito ang mga kinakailangan na dokumento, kauukulang bayarin, at pangkabuuang oras ng pagpoproseso.</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>CC1</label>
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label>Alin sa mga sumusunod ang mga naglalarawan sa iyong kaalaman sa CC?</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 1. Alam ko ang CC at nakita ko ito sa napuntahang opisina.</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 2. Alam ko ang CC pero hindi ko ito nakita sa napuntahang opisina.</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 3. Nalaman ko ang CC nang makita ko ito sa napuntahang opisina.</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc1']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 4. Hindi ko alam kung ano ang CC at wala akong nakita sa napuntahang opisina. </label><br><label>(Lagyan ng tsek ng 'N/A' sa CC2 at CC3 kapag ito ang iyong sagot)</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>CC2</label>
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label>Kung alam ang CC (Nag-tsek sa opsyon 1-3 sa CC1), masasabi mo ba na ang CC nang napuntahang opisina ay...</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 1. Madaling makita</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 4. Hindi nakita</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 2. Medyo madaling makita</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 5) ? $cb_checked : $cb_unchecked; ?>" /> 5. N/A</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc2']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 3. Mahirap makita</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="10%" class="font-size-8pt">
                            <label>CC3</label>
                        </td>
                        <td width="90%" class="font-size-8pt">
                            <label>Kung alam nf CC (Nag-tsek sa opsyon 1-3 sa CC1), gaano nakatulong ang CC sa transaksyon mo?</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 1) ? $cb_checked : $cb_unchecked; ?>" /> 1. Sobrang nakatulong</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 3) ? $cb_checked : $cb_unchecked; ?>" /> 3. Hindi nakatulong</label>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="font-size-8pt">
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 2) ? $cb_checked : $cb_unchecked; ?>" /> 2. Nakatulong naman</label>
                        </td>
                        <td width="45%" class="font-size-8pt">
                            <label><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['cc3']) === 4) ? $cb_checked : $cb_unchecked; ?>" /> 4. N/A</label>
                        </td>
                    </tr>

                    <tr><td colspan="10" width="100%"></td></tr>
                    
                    <tr>
                        <td colspan="10" width="100%" class=" font-size-8pt" 
                            ><label>PANUTO: Para sa SQD 0-8, lagyan ng (✔) ang hanay na pinakaangkop sa inyong sagot.</label>
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
                                    <th class="text-center border-bottom-gray border-right-gray">Lubos na hindi sumasang-ayon</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Hindi sumasang-ayon</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Walang kinikilingan</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Sumasang-ayon</th>
                                    <th class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top">Labis na sumasang-ayon</th>
                                    <th class="text-center border-bottom-gray border-right-gray">Not <br> Applicable</th>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD0.</b> Nasiyahan ako sa serbisyo na aking natanggap sa napuntahan na tanggapan.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd0']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD1.</b> Makatwiran ang oras na aking ginugol para sa pagproseso ng aking transaksyon.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd1']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD2.</b> Ang opisina ay sumusunod sa mga kinakailangang dokumento at mga hakbang batay sa impormasyong ibinigay.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd2']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD3.</b> Ang mga hakbang batay sa pagproseso, kasama na ang pagbayad ay madali at simple lamang.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd3']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD4.</b> Mabilis at madali akong nakahanap ng impormasyon tungkol sa aking transaksyon mula sa opisina o website nito.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd4']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD5.</b> Nagbayad ako ng makatwirang halaga para sa aking transaksyon (Kung ang serbisyo ay ibinigay ng libre, maglagay ng tsek sa hanay na N/A).</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd5']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD6.</b> Pakiramdam ko ay patas ang opisina sa lahat, o "walang palakasan", sa aking transaksyon.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd6']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD7.</b> Magalang akong tinrato ng mga tauhan, at (kung sakali ako ay humingi ng tulong) alam ko na sila ay handang tumulong sa akin.</td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 1) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 2) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 3) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 4) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 5) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                    <td class="text-center border-bottom-gray border-right-gray" style="vertical-align: text-top"><img style="width: 10px;" src="<?php echo ($is_isset_report and intval($report['sqd7']) === 6) ? $cb_checked : $cb_unchecked; ?>" /></td>
                                </tr>
                                <tr>
                                    <td class="border-left-gray border-bottom-gray border-right-gray"><b>SQD8.</b> Nakuha ko ang aking kinakailangan ko mula sa tanggapan ng gobyerno, kung tinanggihan man, ito ay sapat na ipinaliwanag sa akin.</td>
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
                            ><label>Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal):</label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="12" width="100%" class="font-size-8pt font-weight-lighter"
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