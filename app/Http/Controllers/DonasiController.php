<?php

// DonasiController.php
namespace App\Http\Controllers;

// DonasiController.php

use App\Models\donasi;
use Illuminate\Support\Facades\DB;


class DonasiController extends Controller
{

    public function index()
    {
        // Call the jumlah method to calculate total donations
        $totalDonations = $this->jumlah();

        // Pass the total donations to the view
        return view('donasi', ['totalDonations' => $totalDonations]);
    }

    // Function to calculate the total donations and pass the result to the view
    public function jumlah()
    {
        // Use Laravel's Eloquent to perform a query to sum up donations by type
        $totalDonationsByType = donasi::select('jenis', DB::raw('SUM(nominal) as total_nominal'))
            ->groupBy('jenis')
            ->get();

        // Create an associative array to store the total donations for each type
        $totalDonations = [];

        foreach ($totalDonationsByType as $donation) {
            $totalDonations[$donation->jenis] = $donation->total_nominal;
        }

        // Pass the total donations to the view
        return view('donasi', ['totalDonations' => $totalDonations]);
    }

    
}
