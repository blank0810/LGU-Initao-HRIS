<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class RouteController extends Controller
{
    function getLogin()
    {
        return view('login');
    }

    //
    function getDashboard()
    {
        return view('hrViews.pages.dashboard');
    } 

    function getEmployee()
    {
        return view('hrViews.pages.employees');
    }

    function getLeave()
    {
        return view('hrViews.pages.leave');
    }

    function getTravel()
    {
        return view('hrViews.pages.travel');
    }

    function getSlip()
    {
        return view('hrViews.pages.slip');
    }

    function getPayroll()
    {
        return view('hrViews.pages.payroll');
    }
}
