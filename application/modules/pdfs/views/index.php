<?php

    /*
     * Description: 
     * Author:      Jaysonx <juanojayson@gmail.com>
     * Date:        Sep 23, 2020
     */

    tcpdf();
    
    $page_orientation = (isset($is_landscape_orientation) and $is_landscape_orientation) ? 'L' : 'P';
    
    $MT = (isset($mt)) ? $mt : PDF_MARGIN_TOP;
    $ML = (isset($ml)) ? $ml : PDF_MARGIN_LEFT;
    $MR = (isset($mr)) ? $mr : PDF_MARGIN_RIGHT;
    $MB = (isset($mb)) ? $mb : PDF_MARGIN_BOTTOM;
    
    $pdf = new TCPDF($page_orientation, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    
    $pdf->SetTitle(SYSTEM_ALIAS);
    
    $pdf->SetDefaultMonospacedFont('helvetica');
    
    $pdf->SetMargins($ML, $MT, $MR);
    
    $pdf->SetAutoPageBreak(TRUE, $MB);
    
    $pdf->SetFont('helvetica', '', 9);
    
    $pdf->setFontSubsetting(false);
    
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    $pdf->AddPage();
    
    ob_start();


    $this->load->view($view_url);

    
    $content = ob_get_contents();
    
    ob_end_clean();
    
    $pdf->writeHTML($content, true, false, true, false, '');
    
    $pdf->Output(strtolower($output_title), 'I');
