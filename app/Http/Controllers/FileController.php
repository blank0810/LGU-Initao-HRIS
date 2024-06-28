<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use COM;
//use PhpOffice\PhpSpreadsheet\Worksheet\Drawing\Textbox as TextboxConstant;

class FileController extends Controller
{
    //
    public function generatePdf(Request $request)
    {
        try {
            define('msoTextBox', 17); // The value for the msoTextBox constant

            // Path to the template Excel file
            $templateFilePath = 'C:\Users\azuce\Desktop\Leave_Fillable.xlsx';
            
            // Get the application number from the request
            $applicationNumber = $request->input('application_number');
            $employeeName = 'Bangcong, Trisha Jane';

            // Define the destination directory in the public folder
            $destinationDirectory = public_path('Documents');

            // Create the destination directory if it doesn't exist
            if (!file_exists($destinationDirectory)) 
            {
                mkdir($destinationDirectory, 0777, true);
            }

            // Define the destination PDF file path
            $destinationPdfPath = $destinationDirectory . '/leave_application_' . $applicationNumber . '.pdf';

            // Create a new instance of Excel application using COM
            $excel = new \COM("Excel.Application");

            // Open the template Excel file
            $workbook = $excel->Workbooks->Open($templateFilePath);

            // Get the active sheet
            $worksheet = $workbook->ActiveSheet;

            // Loop through all shapes (including textboxes) in the worksheet
            foreach ($worksheet->Shapes as $shape) {
                if ($shape->Type == msoTextBox) {
                    // Check if the textbox has a specific name or other identifiable property
                    if ($shape->Name === 'employeeName') {
                        // Update the text content of the textbox
                        $shape->TextFrame->Characters()->Text = $employeeName;
                    }
                }
            }

            // Save the workbook as a PDF
            $workbook->ExportAsFixedFormat(0, $destinationPdfPath);

            // Close the workbook without saving changes to the Excel file
            $workbook->Close(false);

            // Quit Excel application
            $excel->Quit();

            // Release the COM object
            unset($excel);

            $fileUrl = asset('Documents/leave_application_' . $applicationNumber . '.pdf');

            // Return success response with the file URL
            return response()->json([
                'success' => true,
                'file_path' => $fileUrl,
                'message' => 'File is not created. Contact System Administrator'
            ]);

        } catch (\Exception $e) {

             $workbook->Close();

            // Quit Excel application
            $excel->Quit();
            // Return error response if something goes wrong
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    function printTravel()
    {
        return view('hrViews.pages.printablePages.printTravel');
    }

    function printSlip()
    {
        return view('hrViews.pages.printablePages.printSlip');
    }

    function printJobOrderPayslip()
    {
        return view('hrViews.pages.printablePages.jobOrderPayslip');
    }
}
