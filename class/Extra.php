<?php

class Extra {

    public function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        //return array_map( $this->objectToArray, $object );
        return array_map(array($this, 'objectToArray'), $object);
    }
 public function get_home_desc() {
            $db_obj = new DB();
            $dd_sql = "SELECT home_desc
                     FROM member_values";
            $db_obj->query($dd_sql);
            if($db_obj->rowCount() > 0) {
                $dd_details = $this->objectToArray($db_obj->getRow($dd_sql));
                return $dd_details['home_desc'];
            } else {
            return false;
            }
        }

        public function update_home_desc($desc) {
            $db_obj = new DB();
        $bride_count_update_sql = "UPDATE member_values
                                      SET home_desc= '".$desc."'";
        $db_obj->query($bride_count_update_sql);
        }
    public function get_dropdown_values($table_name) {
        $db_obj = new DB();
        $dd_sql = "SELECT *
                     FROM ".$table_name."
                 ORDER BY ".$table_name;
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }
    public function get_dropdown_values_orderby_id($table_name) {
        $db_obj = new DB();
        $dd_sql = "SELECT *
                     FROM ".$table_name."
                 ORDER BY ".$table_name.'_id';
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }
    public function get_short_country_list() {
       $db_obj = new DB();
        $dd_sql = "SELECT *
                     FROM country
                    WHERE priority=1
                 ORDER BY country";
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }
    public function get_full_country_list() {
       $db_obj = new DB();
        $dd_sql = "SELECT *
                     FROM country
                 ORDER BY country";
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }
    public function get_indian_cities($state_id) {
        $db_obj = new DB();
        $dd_sql = "SELECT city_id,
                          city_name
                     FROM indian_cities
                    WHERE state_id=".$state_id."
                 ORDER BY city_name";
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }
     public function get_lankan_cities($state_id) {
        $db_obj = new DB();
        $dd_sql = "SELECT lanka_district_id,
                          lanka_district
                     FROM lanka_district
                    WHERE lanka_province_id=".$state_id."
                 ORDER BY lanka_district";
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }

    public function get_foriegn_values($table_name,$field_vale) {
        $db_obj = new DB();
        $table_id = $table_name.'_id';
        $foriegn_value_sql = "SELECT $table_name
                                FROM $table_name
                               WHERE $table_id=$field_vale";
							
        $foriegn_value_result = $db_obj->getRow($foriegn_value_sql);
        $extra_obj = new Extra();
        $foriegn_value = $extra_obj->objectToArray($foriegn_value_result);
        return $foriegn_value[$table_name];
    }
	
	public function get_lookingfor_values($table_name,$field_vale) {
        $db_obj = new DB();
        $table_id ='country_id';
        $foriegn_value_sql = "SELECT country
                                FROM $table_name
                               WHERE $table_id=$field_vale";
        $foriegn_value_result = $db_obj->getRow($foriegn_value_sql);
        $extra_obj = new Extra();
        $foriegn_value = $extra_obj->objectToArray($foriegn_value_result);
        return $foriegn_value['country'];
    }

    public function get_indian_city_values($city_id) {
        $db_obj = new DB();
        $city_sql = "SELECT city_name
                       FROM indian_cities
                      WHERE city_id=".$city_id;
        $city_name = $db_obj->getRow($city_sql);
        $extra_obj = new Extra();
        $city_name = $extra_obj->objectToArray($city_name);
        return $city_name['city_name'];
    }
	
	
	 public function getLankaProvince($state_id) {
        $db_obj = new DB();
        $province_sql = "SELECT lanka_province
                       FROM lanka_province
                      WHERE lanka_province_id=".$state_id;
        $province_name = $db_obj->getRow($province_sql);
        $extra_obj = new Extra();
        $province_name = $extra_obj->objectToArray($province_name);
        return $province_name['lanka_province'];
    }
	
	 public function getCanadaState($state_id) {
	 
		 $db_obj = new DB();
        $state_sql = "SELECT canada_states
                       FROM canada_states
                      WHERE canada_states_id=".$state_id;
        $state_name = $db_obj->getRow($state_sql);
        $extra_obj = new Extra();
        $state_name = $extra_obj->objectToArray($state_name);
        return $state_name['canada_states'];
	 
	 
	 }
	 
	  public function getUkState($state_id) {
	 
		 $db_obj = new DB();
        $state_sql = "SELECT uk_states
                       FROM uk_states
                      WHERE uk_states_id=".$state_id;
        $state_name = $db_obj->getRow($state_sql);
        $extra_obj = new Extra();
        $state_name = $extra_obj->objectToArray($state_name);
        return $state_name['uk_states'];
	 
	 
	 }
	 
	  public function getUsState($state_id) {
	 
		 $db_obj = new DB();
        $state_sql = "SELECT usa_states
                       FROM usa_states
                      WHERE usa_states_id=".$state_id;
        $state_name = $db_obj->getRow($state_sql);
        $extra_obj = new Extra();
        $state_name = $extra_obj->objectToArray($state_name);
        return $state_name['usa_states'];
	 
	 
	 }
	 
	  public function getIndianStates($state_id) {
	 
		 $db_obj = new DB();
        $state_sql = "SELECT indian_states
                       FROM indian_states
                      WHERE indian_states_id=".$state_id;
        $state_name = $db_obj->getRow($state_sql);
        $extra_obj = new Extra();
        $state_name = $extra_obj->objectToArray($state_name);
        return $state_name['indian_states'];
	 
	 
	 }
	 
	 
      public function get_dropdown_height_values() {
        $db_obj = new DB();
        $dd_sql = "SELECT *
                     FROM height
                 ORDER BY height_id";
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }
    public function get_dropdown_monthly_sal_values() {
        $db_obj = new DB();
        $dd_sql = "SELECT *
                     FROM monthly_salary
                 ORDER BY monthly_salary_id";
        $get_dd_rst = $db_obj->query($dd_sql);
        $db_obj->getLastQuery();
        $dd_row_count = $db_obj->rowCount();
        if($dd_row_count > 0) {
            $dd_details = $this->objectToArray($db_obj->getResults($dd_sql));
            return $dd_details;
        } else {
            return false;
        }
    }

    //send confirmation mail
   public function send_confirm_mail($to_name, $to_mail, $membership_no,$member_password){

        
        $from_name = 'Exceldtabank Administrator';
        $from_email = 'exceldatabank@yahoo.com';
        $email_obj = new EmailFunc($to_name, $to_mail, $from_name, $from_email);
        //$email_message = "<img src='http://www.tamil-matrimonials.com/images/emailhead.jpg' /><br/>";
        $email_message .= "Dear " . $to_name . ",<br/><br/>";
        $email_message .= "Your Exceldatabank account is confirmed by the Administrator.<br/>";
        $email_message .= "Your Membership No is - " . $membership_no . ".<br/>";
        $email_message .= "Your Password  is - " . $member_password . ".<br/>";
        $email_message .= "please login to http://www.exceldatabank.com to view your account.<br/>";
        $email_message .= "Regards <br/>";
        $email_message .= "Exceldata Bank team.\n";
        $email_obj->buildMessage('Confirm Your Exceldata Account', $email_message);
        $email_obj->sendmail();
    }
   
   
 function force_download($filename = '', $data = '')
	{
		if ($filename == '' OR $data == '')
		{
			return FALSE;
		}

		// Try to determine if the filename includes a file extension.
		// We need it in order to set the MIME type
		if (FALSE === strpos($filename, '.'))
		{
			return FALSE;
		}

		// Grab the file extension
		$x = explode('.', $filename);
		$extension = end($x);

		$mimes = array(	'hqx'	=>	'application/mac-binhex40',
				'cpt'	=>	'application/mac-compactpro',
				'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel'),
				'bin'	=>	'application/macbinary',
				'dms'	=>	'application/octet-stream',
				'lha'	=>	'application/octet-stream',
				'lzh'	=>	'application/octet-stream',
				'exe'	=>	array('application/octet-stream', 'application/x-msdownload'),
				'class'	=>	'application/octet-stream',
				'psd'	=>	'application/x-photoshop',
				'so'	=>	'application/octet-stream',
				'sea'	=>	'application/octet-stream',
				'dll'	=>	'application/octet-stream',
				'oda'	=>	'application/oda',
				'pdf'	=>	array('application/pdf', 'application/x-download'),
				'ai'	=>	'application/postscript',
				'eps'	=>	'application/postscript',
				'ps'	=>	'application/postscript',
				'smi'	=>	'application/smil',
				'smil'	=>	'application/smil',
				'mif'	=>	'application/vnd.mif',
				'xls'	=>	array('application/excel', 'application/vnd.ms-excel', 'application/msexcel'),
				'ppt'	=>	array('application/powerpoint', 'application/vnd.ms-powerpoint'),
				'wbxml'	=>	'application/wbxml',
				'wmlc'	=>	'application/wmlc',
				'dcr'	=>	'application/x-director',
				'dir'	=>	'application/x-director',
				'dxr'	=>	'application/x-director',
				'dvi'	=>	'application/x-dvi',
				'gtar'	=>	'application/x-gtar',
				'gz'	=>	'application/x-gzip',
				'php'	=>	'application/x-httpd-php',
				'php4'	=>	'application/x-httpd-php',
				'php3'	=>	'application/x-httpd-php',
				'phtml'	=>	'application/x-httpd-php',
				'phps'	=>	'application/x-httpd-php-source',
				'js'	=>	'application/x-javascript',
				'swf'	=>	'application/x-shockwave-flash',
				'sit'	=>	'application/x-stuffit',
				'tar'	=>	'application/x-tar',
				'tgz'	=>	array('application/x-tar', 'application/x-gzip-compressed'),
				'xhtml'	=>	'application/xhtml+xml',
				'xht'	=>	'application/xhtml+xml',
				'zip'	=>  array('application/x-zip', 'application/zip', 'application/x-zip-compressed'),
				'mid'	=>	'audio/midi',
				'midi'	=>	'audio/midi',
				'mpga'	=>	'audio/mpeg',
				'mp2'	=>	'audio/mpeg',
				'mp3'	=>	array('audio/mpeg', 'audio/mpg', 'audio/mpeg3'),
				'aif'	=>	'audio/x-aiff',
				'aiff'	=>	'audio/x-aiff',
				'aifc'	=>	'audio/x-aiff',
				'ram'	=>	'audio/x-pn-realaudio',
				'rm'	=>	'audio/x-pn-realaudio',
				'rpm'	=>	'audio/x-pn-realaudio-plugin',
				'ra'	=>	'audio/x-realaudio',
				'rv'	=>	'video/vnd.rn-realvideo',
				'wav'	=>	'audio/x-wav',
				'bmp'	=>	'image/bmp',
				'gif'	=>	'image/gif',
				'jpeg'	=>	array('image/jpeg', 'image/pjpeg'),
				'jpg'	=>	array('image/jpeg', 'image/pjpeg'),
				'jpe'	=>	array('image/jpeg', 'image/pjpeg'),
				'png'	=>	array('image/png',  'image/x-png'),
				'tiff'	=>	'image/tiff',
				'tif'	=>	'image/tiff',
				'css'	=>	'text/css',
				'html'	=>	'text/html',
				'htm'	=>	'text/html',
				'shtml'	=>	'text/html',
				'txt'	=>	'text/plain',
				'text'	=>	'text/plain',
				'log'	=>	array('text/plain', 'text/x-log'),
				'rtx'	=>	'text/richtext',
				'rtf'	=>	'text/rtf',
				'xml'	=>	'text/xml',
				'xsl'	=>	'text/xml',
				'mpeg'	=>	'video/mpeg',
				'mpg'	=>	'video/mpeg',
				'mpe'	=>	'video/mpeg',
				'qt'	=>	'video/quicktime',
				'mov'	=>	'video/quicktime',
				'avi'	=>	'video/x-msvideo',
				'movie'	=>	'video/x-sgi-movie',
				'doc'	=>	'application/msword',
				'docx'	=>	'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				'xlsx'	=>	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
				'word'	=>	array('application/msword', 'application/octet-stream'),
				'xl'	=>	'application/excel',
				'eml'	=>	'message/rfc822'
			);

		// Set a default mime if we can't find it
		if ( ! isset($mimes[$extension]))
		{
			$mime = 'application/octet-stream';
		}
		else
		{
			$mime = (is_array($mimes[$extension])) ? $mimes[$extension][0] : $mimes[$extension];
		}

		// Generate the server headers
		if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== FALSE)
		{
			header('Content-Type: "'.$mime.'"');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header("Content-Transfer-Encoding: binary");
			header('Pragma: public');
			header("Content-Length: ".strlen($data));
		}
		else
		{
			header('Content-Type: "'.$mime.'"');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Pragma: no-cache');
			header("Content-Length: ".strlen($data));
		}

		exit($data);
	}

        public function upload_file($field = '', $dirPath = '', $maxSize = 4000000, $allowed = array()){
            foreach ($_FILES[$field] as $key => $val)
                $$key = $val;

            if ((!is_uploaded_file($tmp_name)) || ($error != 0) || ($size == 0) || ($size > $maxSize))
                return false;    // file failed basic validation checks


            if ((is_array($allowed)) && (!empty($allowed)))
                if (!in_array($type, $allowed))
                    return false;    // file is not an allowed type

    /*do $path = $dirPath . DIRECTORY_SEPARATOR . rand(1, 9999) . strtolower(basename($name));
    while (file_exists($path));*/
            $ext = explode('/', $type);
            $file_name = $_SESSION['tm_membership_no'].'.'.$ext[1];
            $fullPath = $dirPath.$file_name;
            if(move_uploaded_file($tmp_name, $fullPath))
                return $file_name;

            return false;
	}
    function escape($value)
    {
        $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
        $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

        return str_replace($search, $replace, $value);
    }

}

?>
