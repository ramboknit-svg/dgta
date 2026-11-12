@extends('website.app_new')
 @section('content')
    <style nonce="{{ app('cspNonce') }}">
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        /* Container and Title Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .tele-directory h1 {
            text-align: center;
            color: #910b20;
           font-size: 32px;
            margin-bottom: 40px;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Table Container */
        .tele-directory .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            overflow: hidden;
            margin: 0 auto;
            max-width: 100%;
        }

        /* Table Styles */
        .tele-directory table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1rem;
            table-layout: auto;
        }

        /* Header Styles */
        .tele-directory thead {
       
            background: linear-gradient(45deg, #890a1d, #cc1030);
            color: white;
        }

        .tele-directory th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 1.1rem;
                border-bottom: 2px solid #c30f2d;
        }

        /* Body Cell Styles */
        .tele-directory td {
            padding: 15px;
            border-bottom: 1px solid #e8f4f8;
            color: #34495e;
        }

        /* Zebra Striping */
        .tele-directory tbody tr:nth-child(even) {
            background-color: #f8fbff;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hover Effect */
        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background-color: #e3f2fd;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(74, 144, 226, 0.2);
        }

        /* First and Last Column Styling */
        
        th:first-child {
            text-align: center;
            font-weight: 600;
            color: #fff;
        }
        td:first-child {
            text-align: center;
            font-weight: 600;
           
        }

        td:last-child,
        th:last-child {
            text-align: left;
        }

        /* Phone Number Styling */
        td:nth-child(4) {
            font-family: 'Courier New', monospace;
            font-weight: 500;
            color: #e74c3c;
        }

        /* Rank Styling */
        td:nth-child(3) {
            font-weight: 500;
            color: #e74c3c;
        }

        /* Mobile Responsive Design */
        @media screen and (max-width: 768px) {
            

            

            

            .table-container {
                border-radius: 8px;
                overflow-x: auto;
            }

            table {
                font-size: 0.9rem;
                min-width: 600px;
            }

            th {
                padding: 12px 10px;
                font-size: 1rem;
            }

            td {
                padding: 12px 10px;
            }

            /* Mobile-friendly horizontal scroll */
            .table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }

        @media screen and (max-width: 480px) {
           .tele-directory h1 {
                font-size: 1.8rem;
            }

           .tele-directory table {
                font-size: 0.85rem;
            }

           .tele-directory th, td {
                padding: 10px 8px;
            }
        }

        /* Loading Animation */
        .table-container {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Accessibility */
        @media (prefers-reduced-motion: reduce) {
            tbody tr {
                transition: none;
            }
            
            .table-container {
                animation: none;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            th {
                background: #000080;
                color: white;
            }
            
            td {
                border-bottom: 2px solid #000;
            }
        }
    </style>

    <div class="tele-directory">
    <div class="container">
        <!-- Main Title -->
        <h1>Study Lve/MOU</h1>
        
        <!-- Table Container -->
        <div class="table-container">
            <div class="table-wrapper">
                <table>
                    <!-- Table Header -->
                    <thead>
                        <tr>
                            <th>S. No.</th>
        <th>Rank</th>
        <th>Officer Name</th>
        <th>Course / Programme</th>
        <th>Study Leave Order No.</th>
                            
                        </tr>
                    </thead>
                    
                    <!-- Table Body with Sample Data -->
                   <tbody>
    <tr>
        <td>1</td>
        <td>Col</td>
        <td>Prakash Singh</td>
        <td>Higher Defence Management Course</td>
        <td>SL/2024/01</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Lt Col</td>
        <td>Rohit Sharma</td>
        <td>Strategic Studies Programme</td>
        <td>SL/2024/02</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Maj</td>
        <td>Ankit Singh</td>
        <td>Defence Technology Course</td>
        <td>SL/2024/03</td>
    </tr>
    <tr>
        <td>4</td>
        <td>Capt</td>
        <td>Neha Malhotra</td>
        <td>International Relations & Security</td>
        <td>SL/2024/04</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Brig</td>
        <td>Rajiv Khanna</td>
        <td>National Security Strategy</td>
        <td>SL/2024/05</td>
    </tr>
    <tr>
        <td>6</td>
        <td>Capt</td>
        <td>Pooja Mehta</td>
        <td>Logistics & Supply Chain Management</td>
        <td>SL/2024/06</td>
    </tr>
    <tr>
        <td>7</td>
        <td>Col</td>
        <td>Sandeep Chatterjee</td>
        <td>Defence Administration Course</td>
        <td>SL/2024/07</td>
    </tr>
    <tr>
        <td>8</td>
        <td>Lt Col</td>
        <td>Vikram Iyer</td>
        <td>Joint Operations & Planning</td>
        <td>SL/2024/08</td>
    </tr>
    <tr>
        <td>9</td>
        <td>Maj</td>
        <td>Arjun Patel</td>
        <td>Cyber & Information Warfare</td>
        <td>SL/2024/09</td>
    </tr>
    <tr>
        <td>10</td>
        <td>Col</td>
        <td>Anjali Rao</td>
        <td>Public Policy & Governance</td>
        <td>SL/2024/10</td>
    </tr>
</tbody>


                </table>
            </div>
        </div>
    </div>
    </div>
  @endsection