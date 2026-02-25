

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
                            <label class="font-size-15pt font-weight-bold">DEPARTMENT OF AGRARIAN REFORM</label>
                        </td>
                    </tr>
                    
                    <tr><td colspan="10" width="100%"></td></tr>

                    <tr><td colspan="12" width="100%"><hr></td></tr>
                    <tr><td colspan="12" width="100%"></td></tr>
                    
                    <tr>
                        <th style="width: 100%;" colspan="12" class="text-default text-center" style="padding: 2% 0 2% 0; text-decoration: none; text-align: center; font-size: 16pt; letter-spacing: 3;"
                            ><?php echo (isset($report_title) and $report_title) ? $report_title : ''; ?>
                        </th>
                    </tr>
                    <tr><td colspan="12" width="100%"></td></tr>

                </thead>