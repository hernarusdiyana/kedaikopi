<?php
// File: application/controllers/Invoice.php

defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load required libraries/helpers
        $this->load->helper('download');
        $this->load->library('session');
        // Load Dompdf
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    }

    public function export_pdf() {
        // Get invoice data from model (example)
        $this->load->model('invoice_model');
        $invoice_data = $this->invoice_model->get_invoice_data();

        // Load Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // HTML content for invoice
        $html = '<html><body>';
        $html .= '<h1>Invoice</h1>';
        // Add invoice data dynamically
        $html .= '<table>';
        $html .= '<tr><th>Date</th><th>Product</th><th>Quantity</th><th>Total</th></tr>';
        foreach ($invoice_data as $invoice) {
            $html .= '<tr>';
            $html .= '<td>' . $invoice['date'] . '</td>';
            $html .= '<td>' . $invoice['product'] . '</td>';
            $html .= '<td>' . $invoice['quantity'] . '</td>';
            $html .= '<td>' . $invoice['total'] . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '</body></html>';

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Render PDF (optional settings can be added here)
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('invoice.pdf', array('Attachment' => 0));
    }

}
 ?>