

        <form id="feedback_form" method="post" action="#">

            <p class="text-center font-weight-bold text-capitalize" style="font-size: 16pt;">TULUNGAN MO KAMI MAS MAPABUTI ANG AMING PROSESO AT SERBISYO!</p>
            <p class="text-justify">Ang Client Satisfaction Measurement (CSM) ay naglalayong masubaybayan ang karanasan ng taumbayan hingil sa kanilang pakikitransaksyon sa mga tanggapan ng gobyerno. 
                Makatutulong ang iyong kasagutan ukol sa inyong naging karanasan sa <u>katatapos lamang na transaksyon,</u> upang mas mapabuti at lalong mapahusay ang aming serbisyo publiko.
            Ang personal na impormasyon na inyong ibabahagi ay manatiling kumpidensyal. Maari rin piliin na hindi sagutan ang serbey na ito.</p>

            <div class="row hidden">
                <div class="form-group col-sm-12">
                    <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                    <input type="text" id="lang" name="lang" class="form-control" value="<?php echo (isset($lang)) ? $lang : 'tagalog'; ?>" readonly >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Uri ng Kliyente: <small class="text-danger">*</small></label>
                    <div class="form-inline">
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type1" value="1"> 
                            <label class="custom-control-label" for="client_type1">Mamamayan</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type2" value="2">
                            <label class="custom-control-label" for="client_type2">Negosyo</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type3" value="3">
                            <label class="custom-control-label" for="client_type3">Magsasaka</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type4" value="4">
                            <label class="custom-control-label" for="client_type4">May-ari ng lupa</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type5" value="5">
                            <label class="custom-control-label" for="client_type5">Gobyerno (Empleyado o Ahensya)</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type6" value="6">
                            <label class="custom-control-label" for="client_type6">Iba pa</label>
                        </div>
                    </div>
                    <small class="text-danger client_type"></small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Petsa: <small class="text-danger">*</small></label>
                    <input type="date" class="form-control form-control-sm" name="feedback_date" id="feedback_date" 
                        value="<?php echo fn_get_current_date('Y-m-d'); ?>">
                    <small class="text-danger feedback_date"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Kasarian: <small class="text-danger">*</small></label>
                    <select class="form-control form-control-sm" name="sex" id="sex">
                        <option value="0" disabled selected>-Pumili-</option>
                        <option value="1">Lalake</option>
                        <option value="2">Babae</option>
                    </select>
                    <small class="text-danger sex"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Edad: <small class="text-danger">*</small></label>
                    <select class="form-control form-control-sm" name="age_group" id="age_group">
                        <option value="0" disabled selected>-Pumili-</option>
                        <option value="1">30 and below</option>
                        <option value="2">31-40</option>
                        <option value="3">41-50</option>
                        <option value="4">51-60</option>
                        <option value="5">61 and above</option>
                    </select>
                    <small class="text-danger age_group"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Rehiyon (Region of Concern): <small class="text-danger">*</small></label>
                    <input type="text" id="region" class="form-control form-control-sm" name="region" placeholder="Rehiyon (Region of Concern)">
                    <small class="text-danger region"></small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Uri ng transaksyon o serbisyo: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control form-control-sm" name="service_availed" id="service_availed" placeholder="Uri ng transaksyon o serbisyo">
                    <small class="text-danger service_availed"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Time In: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control form-control-sm" name="time_in" id="time_in" placeholder="Time In">
                    <small class="text-danger time_in"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Time Out: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control form-control-sm" name="time_out" id="time_out" placeholder="Time Out">
                    <small class="text-danger time_out"></small>
                </div>
            </div>
            
            <hr>
            <p class="text-justify">PANUTO: Lagyan ng tsek (✔) ang iyong sagot sa mga sumusunod na katanungan tungkol sa Citizen's Charter (CC). 
                Ito ay isang opisyal na dokumento sa naglalaman ng mga serbisyo sa isang ahensya/opisina ng gobyerno, makikita rito ang mga kinakailangan na dokumento, kauukulang bayarin, at pangkabuuang oras ng pagpoproseso.</p>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label><strong>CC1. <small class="text-danger">*</small></strong> Alin sa mga sumusunod ang mga naglalarawan sa iyong kaalaman sa CC?</label>
                </div>
                <div class="col-md-12 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_1" value="1" > 
                        <label class="custom-control-label" for="cc1_1">1. Alam ko ang CC at nakita ko ito sa napuntahang opisina.</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_2" value="2"> 
                        <label class="custom-control-label" for="cc1_2">2. Alam ko ang CC pero hindi ko ito nakita sa napuntahang opisina.</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_3" value="3"> 
                        <label class="custom-control-label" for="cc1_3">3. Nalaman ko ang CC nang makita ko ito sa napuntahang opisina.</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_4" value="4"> 
                        <label class="custom-control-label" for="cc1_4">4. Hindi ko alam kung ano ang CC at wala akong nakita sa napuntahang opisina. <br>(Lagyan ng tsek ng 'N/A' sa CC2 at CC3 kapag ito ang iyong sagot)</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger cc1"></small>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label><strong>CC2. <small class="text-danger">*</small></strong> Kung alam ang CC (Nag-tsek sa opsyon 1-3 sa CC1), masasabi mo ba na ang CC nang napuntahang opisina ay...</label>
                </div>
                <div class="col-md-5 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_1" value="1"> 
                        <label class="custom-control-label" for="cc2_1">1. Madaling makita</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_2" value="2"> 
                        <label class="custom-control-label" for="cc2_2">2. Medyo madaling makita</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_3" value="3"> 
                        <label class="custom-control-label" for="cc2_3">3. Mahirap makita</label>
                    </div>
                </div>
                <div class="col-md-5 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_4" value="4"> 
                        <label class="custom-control-label" for="cc2_4">4. Hindi nakita</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_5" value="5"> 
                        <label class="custom-control-label" for="cc2_5">5. N/A</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger cc2"></small>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label><strong>CC3. <small class="text-danger">*</small></strong> Kung alam nf CC (Nag-tsek sa opsyon 1-3 sa CC1), gaano nakatulong ang CC sa transaksyon mo?</label>
                </div>
                <div class="col-md-5 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_1" value="1"> 
                        <label class="custom-control-label" for="cc3_1">1. Sobrang nakatulong</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_2" value="2"> 
                        <label class="custom-control-label" for="cc3_2">2. Nakatulong naman</label>
                    </div>
                </div>
                <div class="col-md-5 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_3" value="3"> 
                        <label class="custom-control-label" for="cc3_3">3. Hindi nakatulong</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_4" value="4"> 
                        <label class="custom-control-label" for="cc3_4">4. N/A</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger cc3"></small>
                </div>
            </div>

            <hr>
            <p class="text-justify">PANUTO: Para sa SQD 0-8, lagyan ng (✔) ang hanay na pinakaangkop sa inyong sagot.</p>

            <table class="table table-bordered table-sm table-responsive">
                <thead class="thead-light">
                    <tr style="font-size: 10pt;">
                        <th rowspan="2" style="width: 40%; vertical-align: middle"></th>
                        <th style="width: 10%;"><img src="<?php echo base_url('assets/img/sad.png'); ?>" class="img-fluid w-50" /></th>
                        <th style="width: 10%;"><img src="<?php echo base_url('assets/img/indifferent.png'); ?>" class="img-fluid w-50" /></th>
                        <th style="width: 10%;"><img src="<?php echo base_url('assets/img/emoticon.png'); ?>" class="img-fluid w-50" /></th>
                        <th style="width: 10%;"><img src="<?php echo base_url('assets/img/happy-face.png'); ?>" class="img-fluid w-50" /></th>
                        <th style="width: 10%;"><img src="<?php echo base_url('assets/img/happy.png'); ?>" class="img-fluid w-50" /></th>
                        <th style="width: 10%;"><img src="<?php echo base_url('assets/img/na.png'); ?>" class="img-fluid w-50" /></th>
                    </tr>
                    <tr style="font-size: 10pt;">
                        <th>Lubos na hindi sumasang-ayon</th>
                        <th>Hindi sumasang-ayon</th>
                        <th>Walang kinikilingan</th>
                        <th>Sumasang-ayon</th>
                        <th>Labis na sumasang-ayon</th>
                        <th>Not <br> Applicable</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10pt;">
                    <tr>
                        <td class="text-left"><b>SQD0.</b> Nasiyahan ako sa serbisyo na aking natanggap sa napuntahan na tanggapan.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd0" id="sqd0_1" value="1"> 
                                <label class="custom-control-label" for="sqd0_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd0" id="sqd0_2" value="2"> 
                                <label class="custom-control-label" for="sqd0_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd0" id="sqd0_3" value="3"> 
                                <label class="custom-control-label" for="sqd0_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd0" id="sqd0_4" value="4"> 
                                <label class="custom-control-label" for="sqd0_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd0" id="sqd0_5" value="5"> 
                                <label class="custom-control-label" for="sqd0_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd0" id="sqd0_6" value="6"> 
                                <label class="custom-control-label" for="sqd0_6"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><b>SQD1.</b> Makatwiran ang oras na aking ginugol para sa pagproseso ng aking transaksyon.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd1" id="sqd1_1" value="1"> 
                                <label class="custom-control-label" for="sqd1_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd1" id="sqd1_2" value="2"> 
                                <label class="custom-control-label" for="sqd1_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd1" id="sqd1_3" value="3"> 
                                <label class="custom-control-label" for="sqd1_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd1" id="sqd1_4" value="4"> 
                                <label class="custom-control-label" for="sqd1_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd1" id="sqd1_5" value="5"> 
                                <label class="custom-control-label" for="sqd1_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd1" id="sqd1_6" value="6"> 
                                <label class="custom-control-label" for="sqd1_6"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><b>SQD2.</b> Ang opisina ay sumusunod sa mga kinakailangang dokumento at mga hakbang batay sa impormasyong ibinigay.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd2" id="sqd2_1" value="1"> 
                                <label class="custom-control-label" for="sqd2_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd2" id="sqd2_2" value="2"> 
                                <label class="custom-control-label" for="sqd2_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd2" id="sqd2_3" value="3"> 
                                <label class="custom-control-label" for="sqd2_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd2" id="sqd2_4" value="4"> 
                                <label class="custom-control-label" for="sqd2_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd2" id="sqd2_5" value="5"> 
                                <label class="custom-control-label" for="sqd2_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd2" id="sqd2_6" value="6"> 
                                <label class="custom-control-label" for="sqd2_6"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"><b>SQD3.</b> Ang mga hakbang batay sa pagproseso, kasama na ang pagbayad ay madali at simple lamang.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd3" id="sqd3_1" value="1"> 
                                <label class="custom-control-label" for="sqd3_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd3" id="sqd3_2" value="2"> 
                                <label class="custom-control-label" for="sqd3_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd3" id="sqd3_3" value="3"> 
                                <label class="custom-control-label" for="sqd3_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd3" id="sqd3_4" value="4"> 
                                <label class="custom-control-label" for="sqd3_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd3" id="sqd3_5" value="5"> 
                                <label class="custom-control-label" for="sqd3_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd3" id="sqd3_6" value="6"> 
                                <label class="custom-control-label" for="sqd3_6"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-left"><b>SQD4.</b> Mabilis at madali akong nakahanap ng impormasyon tungkol sa aking transaksyon mula sa opisina o website nito.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd4" id="sqd4_1" value="1"> 
                                <label class="custom-control-label" for="sqd4_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd4" id="sqd4_2" value="2"> 
                                <label class="custom-control-label" for="sqd4_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd4" id="sqd4_3" value="3"> 
                                <label class="custom-control-label" for="sqd4_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd4" id="sqd4_4" value="4"> 
                                <label class="custom-control-label" for="sqd4_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd4" id="sqd4_5" value="5"> 
                                <label class="custom-control-label" for="sqd4_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd4" id="sqd4_6" value="6"> 
                                <label class="custom-control-label" for="sqd4_6"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-left"><b>SQD5.</b> Nagbayad ako ng makatwirang halaga para sa aking transaksyon (Kung ang serbisyo ay ibinigay ng libre, maglagay ng tsek sa hanay na N/A).</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd5" id="sqd5_1" value="1"> 
                                <label class="custom-control-label" for="sqd5_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd5" id="sqd5_2" value="2"> 
                                <label class="custom-control-label" for="sqd5_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd5" id="sqd5_3" value="3"> 
                                <label class="custom-control-label" for="sqd5_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd5" id="sqd5_4" value="4"> 
                                <label class="custom-control-label" for="sqd5_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd5" id="sqd5_5" value="5"> 
                                <label class="custom-control-label" for="sqd5_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd5" id="sqd5_6" value="6"> 
                                <label class="custom-control-label" for="sqd5_6"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-left"><b>SQD6.</b> Pakiramdam ko ay patas ang opisina sa lahat, o "walang palakasan", sa aking transaksyon.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd6" id="sqd6_1" value="1"> 
                                <label class="custom-control-label" for="sqd6_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd6" id="sqd6_2" value="2"> 
                                <label class="custom-control-label" for="sqd6_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd6" id="sqd6_3" value="3"> 
                                <label class="custom-control-label" for="sqd6_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd6" id="sqd6_4" value="4"> 
                                <label class="custom-control-label" for="sqd6_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd6" id="sqd6_5" value="5"> 
                                <label class="custom-control-label" for="sqd6_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd6" id="sqd6_6" value="6"> 
                                <label class="custom-control-label" for="sqd6_6"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-left"><b>SQD7.</b> Magalang akong tinrato ng mga tauhan, at (kung sakali ako ay humingi ng tulong) alam ko na sila ay handang tumulong sa akin.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd7" id="sqd7_1" value="1"> 
                                <label class="custom-control-label" for="sqd7_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd7" id="sqd7_2" value="2"> 
                                <label class="custom-control-label" for="sqd7_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd7" id="sqd7_3" value="3"> 
                                <label class="custom-control-label" for="sqd7_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd7" id="sqd7_4" value="4"> 
                                <label class="custom-control-label" for="sqd7_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd7" id="sqd7_5" value="5"> 
                                <label class="custom-control-label" for="sqd7_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd7" id="sqd7_6" value="6"> 
                                <label class="custom-control-label" for="sqd7_6"></label>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-left"><b>SQD8.</b> Nakuha ko ang aking kinakailangan ko mula sa tanggapan ng gobyerno, kung tinanggihan man, ito ay sapat na ipinaliwanag sa akin.</td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd8" id="sqd8_1" value="1"> 
                                <label class="custom-control-label" for="sqd8_1"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd8" id="sqd8_2" value="2"> 
                                <label class="custom-control-label" for="sqd8_2"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd8" id="sqd8_3" value="3"> 
                                <label class="custom-control-label" for="sqd8_3"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd8" id="sqd8_4" value="4"> 
                                <label class="custom-control-label" for="sqd8_4"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd8" id="sqd8_5" value="5"> 
                                <label class="custom-control-label" for="sqd8_5"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="sqd8" id="sqd8_6" value="6"> 
                                <label class="custom-control-label" for="sqd8_6"></label>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="form-group">
                <label for="suggestions">Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal):</label>
                <textarea class="form-control" name="suggestions" id="suggestions" rows="10" maxlength="5000" placeholder="Type your suggestions here..."></textarea>
            </div>

            <div class="text-center mt-4 <?php echo (isset($view_only) and $view_only) ? 'hidden' : ''; ?>">
                <button type="submit" class="btn btn-success px-5"><i class="fa fa-paper-plane"></i> Submit Feedback</button>
            </div>
        </form>