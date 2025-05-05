<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Validator;

class UserImportController extends Controller
{
    // Show the form to upload the CSV/Excel file
    public function showImportForm()
    {
        return view('admin.import');
    }

    // Import users from the uploaded file
    public function import(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv|max:10240', // Max file size 10MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Import the data
        try {
            Excel::import(new UsersImport, $request->file('file'));
            return redirect()->route('admin.users.index')->with('success', 'Users imported successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error occurred while importing: ' . $e->getMessage());
        }
    }
}
