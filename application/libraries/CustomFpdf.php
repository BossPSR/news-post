<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/customFpdf/autoload.php';
require_once dirname(__FILE__) . '/customFpdf/setasign/fpdf/fpdf.php';

class customFpdf extends FPDF
{
    function __construct()
    {
        parent::__construct();
    }
}

/* End of file customFpdf.php */
/* Location: ./application/libraries/customFpdf.php */