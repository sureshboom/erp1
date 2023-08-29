<?php

namespace App\Http\Controllers\User\account;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandCustomer;
use App\Models\LandProject;
use App\Models\LandPaymentHistory;

class LandCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = LandCustomer::select('id','customer_name','project_id','phone','plotno','level','status','promote')->orderBy('id','desc')->get();

        return view('user.account.landcustomer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $landprojects = LandProject::select('id','project_name')->get();
        return view('user.account.landcustomer.create',compact('landprojects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'aadharno' => 'required',
            'pancard' => 'required',
            'project_id' => 'required',
            'plotno' => 'required',
            'plot_area' => 'required',
            'amount' => 'required',
            'advance' => 'required',
            'leadfrom' => 'required',
            'middleman' => 'nullable',
            'remarks' =>'nullable'
        ]);
        $roleFolder = 'images/landcustomer';
        if ($request->hasFile('attachment1')) {
                $attachment1 = $request->file('attachment1');
                
                $path1 = $roleFolder.'/aadhar';
                $attachment1Path = uploadImage($attachment1,$path1);
                $input['attachment1'] = $attachment1Path;
        }
        if ($request->hasFile('attachment2')) {
                $attachment2 = $request->file('attachment2');
                
                $path2 = $roleFolder.'/pan';
                $attachment2Path = uploadImage($attachment2,$path2);
                $input['attachment2'] = $attachment2Path;
        }
        
        $customer = LandCustomer::create($input);
        if($customer)
        {
            flashSuccess('Land Customer created Successfully');
            return redirect()->route('account.landcustomer.index');
        }
        else
        {
            flashError('Something Wrong plz try again ');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = LandCustomer::find($id);

        switch ($customer->level) {
            case '1':
                $levelPercentage = 25;
                $levelColor = 'green'; // Yellow
                $statusview = 'Booking';
                $statuscolor = 'badge-success';
                break;
            case '2':
                $levelPercentage = 50;
                $levelColor = '#d98638'; // Blue
                $statusview = 'Registration & MOD';
                $statuscolor = 'badge-warning';
                break;
            case '3':
                $levelPercentage = 75;
                $levelColor = '#337ab7'; // Green
                $statusview = 'Payment Received';
                $statuscolor = 'badge-primary';
                break;
            case '4':
                $levelPercentage = 100;
                $levelColor = '#cc0a0a'; // Red
                $statusview = 'Closed';
                $statuscolor = 'badge-danger';
                break;
            default:
                $levelPercentage = 0;
                $levelColor = '#ccc'; // Default gray
        }

        return view('user.account.landcustomer.show',compact('customer','levelPercentage','levelColor','statusview','statuscolor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = LandCustomer::find($id);
        $landprojects = LandProject::select('id','project_name')->get();
        return view('user.account.landcustomer.edit',compact('customer','landprojects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'aadharno' => 'required',
            'pancard' => 'required',
            'project_id' => 'required',
            'plotno' => 'required',
            'plot_area' => 'required',
            'amount' => 'required',
            'advance' => 'required',
            'leadfrom' => 'required',
            'middleman' => 'nullable',
            'remarks' =>'nullable'
        ]);
        $roleFolder = 'images/landcustomer';
        if ($request->hasFile('attachment1')) {
                $attachment1 = $request->file('attachment1');
                
                $path1 = $roleFolder.'/aadhar';
                $attachment1Path = uploadImage($attachment1,$path1);
                $input['attachment1'] = $attachment1Path;
        }
        if ($request->hasFile('attachment2')) {
                $attachment2 = $request->file('attachment2');
                
                $path2 = $roleFolder.'/pan';
                $attachment2Path = uploadImage($attachment2,$path2);
                $input['attachment2'] = $attachment2Path;
        }

        $customer = LandCustomer::find($id)->update($input);
        if($customer)
        {
            flashSuccess('Land Customer Updated Successfully');
            return redirect()->route('account.landcustomer.index');
        }
        else
        {
            flashError('Something Wrong plz try again ');
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LandCustomer::find($id)->delete();
        flashSuccess('Customer Removed Successfully');
        return back();
    }


    public function requestPromotion($id)
    {
        $customer = LandCustomer::find($id)->update(['promote' => 1]);
        
        if($customer)
        {
            flashSuccess('Promote request Submitted');
            return back();
        }
        else
        {
            flashSuccess('Something Wrong');
            return back();
        }
    }

    public function receiptview($id)
    {
        $customer = LandCustomer::find($id);
        $type = 'land';
        $dompdf = new Dompdf();
        $imagePath = public_path('image/sks.png');

        if ($imagePath) {
            // Convert image to base64 data URI
            $imageData = base64_encode(file_get_contents($imagePath));
        } else {
            // If image doesn't exist, set to empty string
            $imageData = '';
        }
         $html = view('user.account.downloadrcp',compact('customer','type','imageData'))->render();


        $dompdf->loadHtml($html);

        // Set paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');
        $dompdf->setPaper([0, 0, 800, 900], 'portrait');
        // Render the PDF (first parameter is optional filename)
        $dompdf->render();

        // Get the generated PDF content
        $pdfContent = $dompdf->output();



        // Create a response with the PDF content and appropriate headers
        $response = new Response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="LandReceipt.pdf"',
        ]);

        return $response;
    }

}
