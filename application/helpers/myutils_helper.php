<?php  ( ! defined('BASEPATH')) OR ('No direct script access allowed');


/**
 * Encode a given string using base64_encode multiple times
 */
if ( ! function_exists('fn_encode'))
{
	function fn_encode($value='', $default_times = 1)
	{
                $result = $value;
                
                if (intval($default_times)>1)
                {
                        for ($idx=1; $idx <= $default_times; $idx++)
                        {
                            $result = base64_encode($result);                                
                        }
                } else
                {
                        $result = base64_encode($result);
                }
                
		return $result;
	}
}


/**
 * Decode a given string using base64_decode multiple times
 */
if ( ! function_exists('fn_decode'))
{
	function fn_decode($value='', $default_times = 1)
	{
                $result = $value;
                
                if (intval($default_times)>1)
                {
                        for ($idx=1; $idx <= $default_times; $idx++)
                        {
                            $result = base64_decode($result);                                
                        }
                } else
                {
                        $result = base64_decode($result);
                }
                
		return $result;
	}
}

// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
*/
if ( ! function_exists('fn_format_attendance_type'))
{
	function fn_format_attendance_type($val='')
	{
            $type = new stdClass();
            switch ($val)
            {
                case 1: 
                    $type->clas = 'primary'; 
                    $type->text = 'REGULAR'; 
                    break;
                
                case 2: 
                    $type->clas = 'success'; 
                    $type->text = 'OVERTIME'; 
                    break;
                
            }
            
            return $type;
	}
}

// ------------------------------------------------------------------------

/**
* Returns Get the age based on the given birth date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Dec 18, 2018 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_get_age'))
{
	function fn_get_age($birth_date='')
	{
            $dob    = new DateTime($birth_date);
            $karon  = new DateTime();
            $age    = $dob->diff($karon);

            return $age->y;

	}
}


// ------------------------------------------------------------------------

/**
* Returns Validate a date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_validate_date'))
{
	function fn_validate_date($date='', $format = 'Y-m-d H:i:s')
	{
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
	}
}

// ------------------------------------------------------------------------

/**
* Returns Get current date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 22, 2014 (Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_get_current_date'))
{
	function fn_get_current_date($format = 'Y-m-d H:i:s')
	{
            $now = new DateTime();
            return $now->format($format);
	}
}



// ------------------------------------------------------------------------

/**
* Returns Format a date by default format or by the given format
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 24, 2014 (Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_date'))
{
	function fn_format_date($form_date='', $format = 'Y-m-d H:i:s')
	{
            $date = new DateTime($form_date);
            return $date->format($format);
	}
}



// ------------------------------------------------------------------------

/**
* Returns Add days to a date, the default value for the days to add is 59
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 24, 2014 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_add_days_to_date'))
{
	function fn_add_days_to_date($form_date='', $no_of_days_to_add=59, $format='Y-m-d H:i:s')
	{
            
            $datetime = new DateTime(fn_format_date($form_date));
            
            $datetime->modify('+'.$no_of_days_to_add.' day');
            return $datetime->format($format);

	}
}

// ------------------------------------------------------------------------

/**
* Returns Add days to a date, the default value for the days to add is 59
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 24, 2014 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_subtract_days_to_date'))
{
	function fn_subtract_days_to_date($form_date='', $no_of_days_to_subtract=59, $format='Y-m-d H:i:s')
	{
            
            $datetime = new DateTime(fn_format_date($form_date));
            
            $datetime->modify('-'.$no_of_days_to_subtract.' day');
            return $datetime->format($format);

	}
}


// ------------------------------------------------------------------------

/**
* Returns Subtract days/months/years to a date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 26, 2019 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_subtract_n_to_date'))
{
	function fn_subtract_n_to_date($form_date='', $days_months_years='59 day', $format='Y-m-d H:i:s')
	{
            
            $datetime = new DateTime(fn_format_date($form_date));
            
            $datetime->modify('-'.$days_months_years);
            return $datetime->format($format);

	}
}


// ------------------------------------------------------------------------

/**
* Returns Subtract days/months/years to a date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 26, 2019 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_add_n_to_date'))
{
	function fn_add_n_to_date($form_date='', $days_months_years='59 day', $format='Y-m-d H:i:s')
	{
            
            $datetime = new DateTime(fn_format_date($form_date));
            
            $datetime->modify('+'.$days_months_years);
            return $datetime->format($format);

	}
}


// ------------------------------------------------------------------------

/**
* Returns Format a date by default format or by the given format
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 24, 2014 (Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_get_time_difference'))
{
	function fn_get_time_difference($start_date='', $end_date='', $format = '%H:%i')
	{
            $date1 = new DateTime($start_date);
            $date2 = new DateTime($end_date);

            $diff = date_diff($date1, $date2);

            return $diff->format($format);
	}
}


// ------------------------------------------------------------------------

/**
* Returns Format a name
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Dec 03, 2014 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_format_name'))
{
	function fn_format_name($fname='', $lname='', $mi='', $format='fml')
	{
            $mid = (strlen(trim($mi))>0) ? ' ' . $mi . '.' : '';
            
            $result = '';
            switch($format){
                case 'lfm': $result = $lname . ', ' . $fname . $mid; break;
                case 'fml': $result = $fname . $mid . ' ' . $lname; break;
            }

            return strtoupper($result); 

	}
}


// ------------------------------------------------------------------------

/**
* Returns Format a name
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Dec 03, 2014 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_format_address'))
{
	function fn_format_address($address='', $city='', $state='', $zipcode='', $format='acsz')
	{
            $result = '';
            switch($format){
                case 'acsz': $result = $address . ', ' . $city . ', ' . $state . ' ' . $zipcode; break;
            }

            return strtoupper($result); 

	}
}



/**
* Returns Format a phone
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      June 12, 2015 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_format_phone'))
{
	function fn_format_phone($phone='')
	{
            return preg_replace("/([0-9]{3})([0-9]{3})([0-9])/", "($1) $2-$3", $phone); 
	}
}


/**
* Returns Removes the characters other than numbers
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 20, 2015 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_format_to_number'))
{
	function fn_format_to_number($string='')
	{
            return preg_replace( '/[^0-9]/', '', $string); 
	}
}




// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_user_type'))
{
	function fn_format_user_type($val='')
	{
            $user_type = '';
            switch ($val)
            {
                case USER_TYPE_ADMIN: 
                    $user_type = 'Super Administrator'; 
                    break;
                
                case USER_TYPE_SUPERVISOR: 
                    $user_type = 'Supervisor'; 
                    break;
                
                case USER_TYPE_STUDENT: 
                    $user_type = 'Student'; 
                    break;
                
            }
            
            return $user_type;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_client_type'))
{
	function fn_format_client_type($val='')
	{
            $user_type = '';
            switch ($val)
            {
                case 1: 
                    $user_type = 'CITIZEN'; 
                    break;
                
                case 2: 
                    $user_type = 'STUDENT'; 
                    break;
                
                case 3: 
                    $user_type = 'GOVT'; 
                    break;
                
                case 4: 
                    $user_type = 'FARMER'; 
                    break;
                
                case 5: 
                    $user_type = 'LANDOWNER'; 
                    break;
                
                case 6: 
                    $user_type = 'OTHER'; 
                    break;
                
            }
            
            return $user_type;
	}
}

// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_age_group'))
{
	function fn_format_age_group($val='')
	{
            $user_type = '';
            switch ($val)
            {
                case 1: 
                    $user_type = '<30'; 
                    break;
                
                case 2: 
                    $user_type = '31-40'; 
                    break;
                
                case 3: 
                    $user_type = '41-50'; 
                    break;
                
                case 4: 
                    $user_type = '51-60'; 
                    break;
                
                case 5: 
                    $user_type = '>51'; 
                    break;
                
            }
            
            return $user_type;
	}
}



// ------------------------------------------------------------------------

/**
* Returns Validate a date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_profile_type'))
{
	function fn_format_profile_type($val='')
	{
            $user_type = '';
            switch ($val)
            {
                case PROFILE_STAFF:     $user_type = 'Staff'; break;
                case PROFILE_CUSTOMER:  $user_type = 'Customer'; break;
                case PROFILE_DRIVER:    $user_type = 'Driver'; break;
                case PROFILE_EMPLOYEE:  $user_type = 'Employee'; break;
            }
            
            return $user_type;
	}
}



// ------------------------------------------------------------------------

/**
* Returns Format to money
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Dec 3, 2016 (Created by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_to_money'))
{
	function fn_format_to_money($val='', $decimal=2)
	{
            $money = number_format($val, $decimal);
            
            return $money;
	}
}


// ------------------------------------------------------------------------

/**
* Returns Format stage
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      June 10, 2019 (Created by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_number_stage'))
{
	function fn_format_number_stage($val='')
	{
            $stage = '';
            switch (intval($val))
            {
                case 1: $stage = 'Primary'; break;
                case 2: $stage = 'Secondary'; break;
                case 3: $stage = 'Tertiary'; break;
            }
            
            return $stage;
	}
}



if ( ! function_exists('fn_get_total_days_in_month'))
{
	function fn_get_total_days_in_month($month='', $year='')
	{
            $days;
    
            $year  = ($month>12) ? intval($year)+1   : $year;
            $month = ($month>12) ? intval($month)-12 : $month;

            switch($month) {
                case 1: case 3:
                case 5: case 7:
                case 8: case 10:
                case 12:
                    $days = 31;
                    break;
                case 4: case 6:
                case 9: case 11:
                    $days = 30;
                    break; 
                case 2:
                    $days = (fn_is_leap_year($year)) ? 29 : 28;
                    break;
            }
            return ($days);
            
            return $stage;
	}
}


if ( ! function_exists('fn_is_leap_year'))
{
	function fn_is_leap_year($year='')
	{
            if ((($year % 4)==0) && (($year % 100)!=0) || (($year % 400)==0)) {
                return (true);
            } else { return (false); }
	}
}


// ------------------------------------------------------------------------

/**
* Returns Format a date by default format or by the given format
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      June 24, 2019 (Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_get_date_difference'))
{
	function fn_get_date_difference($start_date='', $end_date='')
	{
            $date1 = new DateTime($start_date);
            $date2 = new DateTime($end_date);
            
            $interval = $date1->diff($date2);

            return $interval->days;
	}
}


// ------------------------------------------------------------------------

/**
* Returns Validate a date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_civil_status'))
{
	function fn_format_civil_status($val='')
	{
            $civil_status = 'SINGLE';
            switch ($val)
            {
                case 1: $civil_status = 'SINGLE'; break;
                case 2: $civil_status = 'MARRIED'; break;
                case 3: $civil_status = 'DIVORCED'; break;
                case 4: $civil_status = 'WIDOW/WIDOWER'; break;
            }
            
            
            return $civil_status;
	}
}

// ------------------------------------------------------------------------

/**
* Returns convert patient status
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 16, 2019 by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_patient_status'))
{
	function fn_format_patient_status($val='')
	{
            $status = 'PENDING';
            switch ($val)
            {
                case PATIENT_STATUS_PENDING:    $status = 'PENDING'; break;
                case PATIENT_STATUS_ADMIT:      $status = 'ADMITTED'; break;
                case PATIENT_STATUS_HOSPITAL:   $status = 'HOSPITALIZED'; break;
                case PATIENT_STATUS_DISCHARGE:  $status = 'DISCHARGED'; break;
            }
            
            
            return $status;
	}
}

// ------------------------------------------------------------------------

/**
* Returns get the patient status class
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 22, 2019 by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_get_patient_status_class'))
{
	function fn_get_patient_status_class($val='')
	{
            $status = 'text-warning';
            switch ($val)
            {
                case PATIENT_STATUS_PENDING:    $status = 'label-warning'; break;
                case PATIENT_STATUS_ADMIT:      $status = 'label-success'; break;
                case PATIENT_STATUS_HOSPITAL:   $status = 'label-info'; break;
                case PATIENT_STATUS_DISCHARGE:  $status = 'label-danger'; break;
            }
            
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
* Returns convert patient status
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 16, 2019 by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_referral_status'))
{
	function fn_format_referral_status($val='')
	{
            $status = 'PENDING';
            switch ($val)
            {
                case REFERRAL_STATUS_PENDING:   $status = 'PENDING'; break;
                case REFERRAL_STATUS_APPROVE:   $status = 'APPROVED'; break;
                case REFERRAL_STATUS_DISAPPROVE: $status = 'DISAPPROVED'; break;
            }
            
            
            return $status;
	}
}

// ------------------------------------------------------------------------

/**
* Returns get the patient status class
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 22, 2019 by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_get_referral_status_class'))
{
	function fn_get_referral_status_class($val='')
	{
            $status = 'text-warning';
            switch ($val)
            {
                case REFERRAL_STATUS_PENDING:   $status = 'text-warning'; break;
                case REFERRAL_STATUS_APPROVE:   $status = 'text-success'; break;
                case REFERRAL_STATUS_DISAPPROVE: $status = 'text-danger'; break;
            }
            
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_note_status'))
{
	function fn_format_note_status($val='')
	{
            $status = '';
            switch (intval($val))
            {
                case NOTE_STATUS_EDIT: 
                    $status = 'FOR EDITING'; 
                    break;
                
                case NOTE_STATUS_REVIEW: 
                    $status = 'FOR REVIEW'; 
                    break;
                
                case NOTE_STATUS_LOCK: 
                    $status = 'LOCKED'; 
                    break;
                
                case NOTE_STATUS_BILLING: 
                    $status = 'FOR BILLING'; 
                    break;
                
            }
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
* Returns get the patient status class
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 22, 2019 by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_note_status_class'))
{
	function fn_format_note_status_class($val='')
	{
            $status = 'text-warning';
            switch ($val)
            {
                case NOTE_STATUS_EDIT:      $status = 'text-warning'; break;
                case NOTE_STATUS_REVIEW:    $status = 'text-info'; break;
                case NOTE_STATUS_LOCK:      $status = 'text-success'; break;
                case NOTE_STATUS_BILLING:   $status = 'text-danger'; break;
            }
            
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_add_3_dots_to_string'))
{
	function fn_add_3_dots_to_string($string='', $limit=0)
        {
            $result = '';
            if(strlen($string) > $limit) 
            {
              $result = substr($string, 0, $limit) . '...'; 
            }
            else 
            {
              $result = $string;
            }
            
            return $result;
        }
}

// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      May 19, 2020 (Created by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_generate_random_avatar'))
{
	function fn_generate_random_avatar($gender='')
        {
            $result = '';
            
            $female_avatars = array(
                'assets/img/profiles/female-1.jpg',
                'assets/img/profiles/female-2.jpg',
                'assets/img/profiles/female-3.jpg',
            );
            
            $male_avatars = array(
                'assets/img/profiles/male-1.jpg',
                'assets/img/profiles/male-2.jpg',
                'assets/img/profiles/male-3.jpg',
                'assets/img/profiles/male-4.jpg',
            );
            
            switch (intval($gender))
            {
                case 1: // Female
                    
                    $random = array_rand($female_avatars);
                    $result = $female_avatars[$random];
                    
                    break;
                
                case 2: // Male
                    
                    $random = array_rand($male_avatars);
                    $result = $male_avatars[$random];
                    
                    break;
                
                default :
                    
                    $random = array_rand($male_avatars);
                    $result = $agency_avatars[$random];
                    
            }
            
            return $result;
            
        }
        
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Jul 28, 2020 (Created by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_get_2digits_in_string'))
{
	function fn_get_2digits_in_string($string='')
        {
            return trim(strtoupper(substr($string, 0, 2)));
        }
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_payment_mode'))
{
	function fn_format_payment_mode($val='')
	{
            $mode = '';
            switch (intval($val))
            {
                case 1: 
                    $mode = 'CASH'; 
                    break;
                
                case 2: 
                    $mode = 'CHEQUE'; 
                    break;
                
                case 3: 
                    $mode = 'CREDIT/DEBIT CARD'; 
                    break;
                
            }
            
            return $mode;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_payment_status'))
{
	function fn_format_payment_status($val='')
	{
            $status = '';
            switch (intval($val))
            {
                case PAYMENT_STATUS_UNPAID: 
                    $status = 'UNPAID'; 
                    break;
                
                case PAYMENT_STATUS_PARTIAL: 
                    $status = 'PARTIALLY PAID'; 
                    break;
                
                case PAYMENT_STATUS_FULL: 
                    $status = 'FULLY PAID'; 
                    break;
                
            }
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_checkin_status'))
{
	function fn_format_checkin_status($val='')
	{
            $status = '';
            switch (intval($val))
            {
                case CHECKIN_STATUS_PENDING: 
                    $status = 'PENDING'; 
                    break;
                
                case CHECKIN_STATUS_CONFIRM: 
                    $status = 'CONFIRMED'; 
                    break;
                
                case CHECKIN_STATUS_IN: 
                    $status = 'CHECKED IN'; 
                    break;
                
                case CHECKIN_STATUS_OUT: 
                    $status = 'CHECKED OUT'; 
                    break;
                
                case CHECKIN_STATUS_CANCEL: 
                    $status = 'CANCELLED'; 
                    break;
                
            }
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_log_type'))
{
	function fn_format_log_type($val='', $isAddon)
	{
            $status = '';
            switch (intval($val))
            {
                case 1: 
                    $status = 'ADDED'; 
                    break;
                
                case 2: 
                    $status = ($isAddon) ? 'ADD ON' : 'WALK-IN'; 
                    break;
                
                case 3: 
                    $status = 'REMOVED'; 
                    break;
                
            }
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_format_payment_type'))
{
	function fn_format_payment_type($val='')
	{
            $status = '';
            switch (intval($val))
            {
                case 1: 
                    $status = 'CHECKIN'; 
                    break;
                
                case 2: 
                    $status = 'EXTEND'; 
                    break;
                
                case 3: 
                    $status = 'ADDON'; 
                    break;
                
                case 4: 
                    $status = 'WALKIN'; 
                    break;
                
            }
            
            return $status;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
*/
if ( ! function_exists('fn_format_ojt_status'))
{
	function fn_format_ojt_status($val='')
	{
            $status = '';
            switch (intval($val))
            {
                case 0: 
                    $status = 'PENDING'; 
                    break;
                
                case 1: 
                    $status = 'ON-GOING'; 
                    break;
                
                case 2: 
                    $status = 'COMPLETED'; 
                    break;
                
                case 3: 
                    $status = 'CANCELED'; 
                    break;
                
            }
            
            return $status;
	}
}

// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
*/
if ( ! function_exists('fn_get_completion_percentage'))
{
	function fn_get_completion_percentage($rendered, $required)
	{
            // Convert "H:i" format to decimal hours
            list($h, $m) = explode(":", $rendered);
            $renderedHours = $h + ($m / 60);

            // Calculate percentage
            $percentage = ($renderedHours / $required) * 100;

            // Format to 2 decimal places
            return number_format($percentage, 2) . "%";
	}
}




// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
*/
if ( ! function_exists('fn_format_announcement_type'))
{
	function fn_format_announcement_type($val='')
	{
            $type = new stdClass();
            switch ($val)
            {
                case 1: 
                    $type->clas = 'primary'; 
                    $type->text = 'ALL'; 
                    break;
                
                case 2: 
                    $type->clas = 'info'; 
                    $type->text = 'STUDENTS ONLY'; 
                    break;
                
                case 3: 
                    $type->clas = 'success'; 
                    $type->text = 'SUPERVISORS ONLY'; 
                    break;
                
            }
            
            return $type;
	}
}

// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
*/
if ( ! function_exists('fn_format_student_status'))
{
	function fn_format_student_status($val='')
	{
            $type = new stdClass();
            switch ($val)
            {
                case 0: 
                    $type->clas = 'warning'; 
                    $type->text = 'PENDING'; 
                    break;
                
                case 1: 
                    $type->clas = 'primary'; 
                    $type->text = 'ON-GOING'; 
                    break;
                
                case 2: 
                    $type->clas = 'success'; 
                    $type->text = 'COMPLETED'; 
                    break;
                
                case 3: 
                    $type->clas = 'danger'; 
                    $type->text = 'CANCELED'; 
                    break;
                
            }
            
            return $type;
	}
}


// ------------------------------------------------------------------------

/**
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      Nov 19, 2014 (Tiny modification by Jaysonx <juanojayson@gmail.com>
*/
if ( ! function_exists('fn_add_zeros_to_front'))
{
	function fn_add_zeros_to_front($number='', $length=1)
	{
            return substr(str_repeat(0, $length).$number, - $length);
	}
}



// ------------------------------------------------------------------------

/**
* Returns Subtract days/months/years to a date
*
* @access	public
* @param	mixed
* @return	mixed
* 
* @version      July 26, 2019 (Jaysonx <juanojayson@gmail.com>)
*/
if ( ! function_exists('fn_time_elapsed_string'))
{
        function fn_time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = [
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            ];
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

}