

                <thead>
                    
                    <tr>
                        <td style="width: 10%;" colspan="2">
                            <?php if(APP_CS_LOGO) { ?>
                                <img src="<?php echo  base_url(APP_CS_LOGO); ?>" style="width: 60px" /> 
                            <?php } ?>
                        </td>
                        <td style="width: 80%; text-align: center;" colspan="8">
                            <span style="font-size: 16pt;" class="text-default font-weight-bold"><?php echo SYSTEM_TITLE; ?></span>
                            <div style="font-size: 12pt;">
                                <b>St. Vincent's College Incorporated</b><br>
                                <i>College of Computer Studies</i><br>
                                Padre Ramon Street, Estaka, Dipolog City, 7100, Philippines
                            </div>
                        </td>
                        <td style="width: 10%;" colspan="2">
                            <?php if(APP_SCHOOL_LOGO) { ?>
                                <img src="<?php echo  base_url(APP_SCHOOL_LOGO); ?>" style="width: 60px" /> 
                            <?php } ?>
                        </td>
                    </tr>
                    
                    <tr><td colspan="12" width="100%"><hr></td></tr>
                    <tr><td colspan="12" width="100%"></td></tr>
                    
                    <tr>
                        <th style="width: 100%;" colspan="12" class="text-default text-center" style="padding: 2% 0 2% 0; text-decoration: none; text-align: center; font-size: 16pt; letter-spacing: 3;"
                            ><?php echo (isset($report_title) and $report_title) ? $report_title : ''; ?>
                        </th>
                    </tr>
                    <tr><td colspan="12" width="100%"></td></tr>

                </thead>