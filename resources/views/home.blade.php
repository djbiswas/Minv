@extends('layouts.admin')
@section('content')

    <!-- Container -->
    <div class="container-main container">
        <div class="row mt-minus">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h5 class="page-heading text-light mb-4 mt-4 mt-md-0"><i class="material-icons">home</i>Dashboard</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/accounts" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-blue-2 rounded-circle p-3 mb-2">credit_card</i>
                            <span>Debit</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/deposits" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-red-1 rounded-circle p-3 mb-2">account_balance</i>
                            <span>Deposit</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="#" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-green-1 rounded-circle p-3 mb-2">local_atm</i>
{{--                            <span>Loan Management</span>--}}
                            <span>Management</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/suppliers" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-blue-3 rounded-circle p-3 mb-2">people_alt</i>
                            <span>Add Supplier</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/sales_report" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-blue-3 rounded-circle p-3 mb-2">notes</i>
                            <span>Sales Report</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/customers" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons text-light bg-blue-2 rounded-circle p-3 mb-2">people_alt</i>
                            <span>Add Customer</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/products" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-red-1 rounded-circle p-3 mb-2">archive</i>
                            <span>Add Product</span>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 mb-3">
                        <a href="/sales" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                            <i class="material-icons-outlined text-light bg-green-1 rounded-circle p-3 mb-2">bar_chart</i>
                            <span>New Sale</span>
                        </a>
                    </div>

                    <!--							<div class="col-lg-3 col-md-4 mb-3">
                                                    <a href="#" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                                                        <i class="material-icons-outlined text-light bg-green-1 rounded-circle p-3 mb-2">bar_chart</i>
                                                        <span>Sales</span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 col-md-4 mb-3">
                                                    <a href="#" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                                                        <i class="material-icons-outlined text-light bg-blue-3 rounded-circle p-3 mb-2">notes</i>
                                                        <span>Report</span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 col-md-4 mb-3">
                                                    <a href="#" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                                                        <i class="material-icons text-light bg-blue-2 rounded-circle p-3 mb-2">people_alt</i>
                                                        <span>Customer</span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 col-md-4 mb-3">
                                                    <a href="#" class="home-link bg-white d-flex flex-column align-items-center justify-content-center text-center px-2 py-4 rounded-lg shadow-sm">
                                                        <i class="material-icons-outlined text-light bg-red-1 rounded-circle p-3 mb-2">archive</i>
                                                        <span>Product</span>
                                                    </a>
                                                </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

@endsection
