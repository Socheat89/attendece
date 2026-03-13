<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    /**
     * Download invoice as PDF.
     */
    public function download(Invoice $invoice)
    {
        $pdf = Pdf::loadView('admin.invoices.pdf', compact('invoice'))
            ->setPaper('a4', 'portrait');

        $filename = 'invoice-' . $invoice->invoice_number . '.pdf';

        return $pdf->download($filename);
    }
}
