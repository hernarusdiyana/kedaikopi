<?php 
// File: application/controllers/Sales.php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load required libraries/helpers
        $this->load->helper('download');
        $this->load->library('session');
        // Load PhpSpreadsheet
        require_once APPPATH . 'third_party/vendor/autoload.php';
    }

    public function export_csv() {
        // Get sales data from model (example)
        $this->load->model('sales_model');
        $sales_data = $this->sales_model->get_sales_data();

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Product');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'Total');

        // Fill data
        $row = 2;
        foreach ($sales_data as $sale) {
            $sheet->setCellValue('A' . $row, $sale['date']);
            $sheet->setCellValue('B' . $row, $sale['product']);
            $sheet->setCellValue('C' . $row, $sale['quantity']);
            $sheet->setCellValue('D' . $row, $sale['total']);
            $row++;
        }

        // Create CSV file
        $writer = new Csv($spreadsheet);
        $file_name = 'sales_report.csv';
        $writer->save('php://output');

        // Force download
        force_download($file_name, NULL);
    }

}

?>