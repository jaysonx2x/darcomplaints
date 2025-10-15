

        <form id="feedback_form" method="post" action="#">

            <p class="text-center font-weight-bold text-capitalize" style="font-size: 16pt;">HELP US SERVE YOU BETTER!</p>
            <p class="text-justify">This Client Satisfaction Measurement (CSM) tracks the customer experience of government offices. Your feedback will help us provide better service. Personal information shared will remain confidential.</p>

            <div class="row hidden">
                <div class="form-group col-sm-12">
                    <input type="text" id="id" name="id" class="form-control" value="0" readonly >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Client Type: <small class="text-danger">*</small></label>
                    <div class="form-inline">
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type1" value="1"> 
                            <label class="custom-control-label" for="client_type1">Citizen</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type2" value="2">
                            <label class="custom-control-label" for="client_type2">Student</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type4" value="4">
                            <label class="custom-control-label" for="client_type4">Farmer</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type3" value="3">
                            <label class="custom-control-label" for="client_type3">Landowner</label>
                        </div>
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type5" value="5">
                            <label class="custom-control-label" for="client_type5">Government Employee</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="client_type" id="client_type6" value="6">
                            <label class="custom-control-label" for="client_type6">Others</label>
                        </div>
                    </div>
                    <small class="text-danger client_type"></small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Date: <small class="text-danger">*</small></label>
                    <input type="date" class="form-control form-control-sm" name="feedback_date" id="feedback_date" 
                        value="<?php echo fn_get_current_date('Y-m-d'); ?>">
                    <small class="text-danger feedback_date"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Sex: <small class="text-danger">*</small></label>
                    <select class="form-control form-control-sm" name="sex" id="sex">
                        <option value="0" disabled selected>-Select-</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                    <small class="text-danger sex"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Age Group: <small class="text-danger">*</small></label>
                    <select class="form-control form-control-sm" name="age_group" id="age_group">
                        <option value="0" disabled selected>-Select-</option>
                        <option value="1">30 and below</option>
                        <option value="2">31-40</option>
                        <option value="3">41-50</option>
                        <option value="4">51-60</option>
                        <option value="5">61 and above</option>
                    </select>
                    <small class="text-danger age_group"></small>
                </div>
                <div class="form-group col-md-3">
                    <label>Region of Concern: <small class="text-danger">*</small></label>
                    <input type="text" id="region" class="form-control form-control-sm" name="region" placeholder="Region of Concern">
                    <small class="text-danger region"></small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Service Availed: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control form-control-sm" name="service_availed" id="service_availed" placeholder="Service Availed">
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
            <p class="text-justify">INSTRUCTIONS: <b>Check mark </b>(✔) your answer to the Citizen's Charter (CC) questions. 
                The Citizen's Charter is an official document that reflects the services of a government agency/office including its requirements, fees, and processing times among others.</p>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label><strong>CC1. <small class="text-danger">*</small></strong> Which of the following best describes your awareness of a CC?</label>
                </div>
                <div class="col-md-12 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_1" value="1" > 
                        <label class="custom-control-label" for="cc1_1">I know what a CC is and I saw this office’s CC.</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_2" value="2"> 
                        <label class="custom-control-label" for="cc1_2">I know what a CC is but I did NOT see this office’s CC.</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_3" value="3"> 
                        <label class="custom-control-label" for="cc1_3">I learned of the CC only when I saw this office’s CC.</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc1" id="cc1_4" value="4"> 
                        <label class="custom-control-label" for="cc1_4">I do not know what a CC is and did not see one in this office.</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger cc1"></small>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label><strong>CC2. <small class="text-danger">*</small></strong> If aware of CC (asnwered 1-3 in CC1), would you say that the CC of this office was...?</label>
                </div>
                <div class="col-md-5 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_1" value="1"> 
                        <label class="custom-control-label" for="cc2_1">Easy to see</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_2" value="2"> 
                        <label class="custom-control-label" for="cc2_2">Somewhat easy to see</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_3" value="3"> 
                        <label class="custom-control-label" for="cc2_3">Difficult to see</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_4" value="4"> 
                        <label class="custom-control-label" for="cc2_4">Not visible at all</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc2" id="cc2_5" value="5"> 
                        <label class="custom-control-label" for="cc2_5">N/A</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger cc2"></small>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <label><strong>CC3. <small class="text-danger">*</small></strong> If aware of CC (asnwered 1-3 in CC1), how much did the CC help you in your transaction?</label>
                </div>
                <div class="col-md-5 ml-3">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_1" value="1"> 
                        <label class="custom-control-label" for="cc3_1">Helped very much</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_2" value="2"> 
                        <label class="custom-control-label" for="cc3_2">Somewhat helped</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_3" value="3"> 
                        <label class="custom-control-label" for="cc3_3">Did not help</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="cc3" id="cc3_4" value="4"> 
                        <label class="custom-control-label" for="cc3_4">N/A</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <small class="text-danger cc3"></small>
                </div>
            </div>

            <hr>
            
            <p>INSTRUCTIONS: For SQD 0-8, please put a <b>check mark</b> (✔) on the column that best corresponds to your answer.</p>

            <table class="table table-bordered table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Question</th>
                        <th><i class="fa fa-frown smiley"></i><br>Strongly Disagree</th>
                        <th><i class="fa fa-meh smiley"></i><br>Disagree</th>
                        <th><i class="fa fa-meh-blank smiley"></i><br>Neither</th>
                        <th><i class="fa fa-smile smiley"></i><br>Agree</th>
                        <th><i class="fa fa-laugh-beam smiley"></i><br>Strongly Agree</th>
                        <th>N/A</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10pt;">
                    <tr>
                        <td class="text-left"><b>SQD0.</b> I am satisfied with the service I availed.</td>
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
                        <td class="text-left"><b>SQD1.</b> I spent a reasonable amount of time for my transaction.</td>
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
                        <td class="text-left"><b>SQD2.</b> The office followed the transaction's requirements and steps based on the information provided.</td>
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
                        <td class="text-left"><b>SQD3.</b> The steps (including payment) I needed to do for my transaction were easy and simple.</td>
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
                        <td class="text-left"><b>SQD4.</b> I easily found information about my transaction from the office or its website.</td>
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
                        <td class="text-left"><b>SQD5.</b> I paid a reasonable amount of fees for my transaction.</td>
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
                        <td class="text-left"><b>SQD6.</b> I feel the office was fair to everyone, or "walang palakasan", during my transaction.</td>
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
                        <td class="text-left"><b>SQD7.</b> I was treated courteously by the staff, and (if asked for help) the staff was helpful.</td>
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
                        <td class="text-left"><b>SQD8.</b> I got what I needed from the government office, or (I denied) denial or request was sufficiently explained to me.</td>
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
                <label for="suggestions">Suggestions on how we can further improve our services (optional):</label>
                <textarea class="form-control" name="suggestions" id="suggestions" rows="6" maxlength="5000" placeholder="Type your suggestions here..."></textarea>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-5"><i class="fa fa-paper-plane"></i> Submit Feedback</button>
            </div>
        </form>