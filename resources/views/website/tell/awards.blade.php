@extends('website.app_new')

@section('content')
<style nonce="{{ app('cspNonce') }}">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .tele-directory {
        min-height: calc(100vh - 160px);
        padding-bottom: 30px;
    }

    .tele-directory .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .tele-directory h1 {
        text-align: center;
        color: #F9fdfb;
        font-size: 32px;
        margin-bottom: 30px;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .tele-directory .search-box {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .tele-directory .search-box input {
        width: 320px;
        max-width: 100%;
        padding: 12px 15px;
        border: 1px solid #D8C48D;
        border-radius: 8px;
        font-size: 15px;
        outline: none;
        transition: all 0.3s ease;
    }

    .tele-directory .search-box input:focus {
        border-color: #1B4E2F;
        box-shadow: 0 0 0 3px rgba(27, 78, 47, 0.12);
    }

    .tele-directory .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        overflow: hidden;
        margin: 0 auto;
        max-width: 100%;
        animation: fadeInUp 0.6s ease-out;
    }

    .tele-directory .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .tele-directory table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1rem;
        table-layout: auto;
    }

    .tele-directory thead {
        background: linear-gradient(45deg, #1B4E2F, #2F6B43);
        color: white;
    }

    .tele-directory th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 1.1rem;
        border-bottom: 2px solid #2F6B43;
    }

    .tele-directory td {
        padding: 15px;
        border-bottom: 1px solid #EEF5EA;
        color: #254A34;
    }

    .tele-directory tbody tr:nth-child(even) {
        background-color: #f8fbff;
    }

    .tele-directory tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .tele-directory tbody tr {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .tele-directory tbody tr:hover {
        background-color: #EEF5EA;
        box-shadow: inset 0 0 0 9999px rgba(227, 242, 253, 0.15);
    }

    .tele-directory th:first-child,
    .tele-directory td:first-child {
        text-align: center;
        font-weight: 600;
    }

    .tele-directory td:last-child,
    .tele-directory th:last-child {
        text-align: left;
    }

    .tele-directory td:nth-child(4) {
        font-family: 'Courier New', monospace;
        font-weight: 500;
        color: #e74c3c;
    }

    .tele-directory td:nth-child(3) {
        font-weight: 500;
        color: #e74c3c;
    }

    .no-search-result {
        display: none;
        text-align: center;
        padding: 20px;
        font-weight: 600;
        color: #1B4E2F;
        background: #fff8f8;
        border-top: 1px solid #E2EBDD;
    }

    @media screen and (max-width: 768px) {
        .tele-directory .table-container {
            border-radius: 8px;
        }

        .tele-directory .search-box {
            justify-content: center;
        }

        .tele-directory .search-box input {
            width: 100%;
        }

        .tele-directory table {
            font-size: 0.9rem;
            min-width: 900px;
        }

        .tele-directory th {
            padding: 12px 10px;
            font-size: 1rem;
        }

        .tele-directory td {
            padding: 12px 10px;
        }
    }

    @media screen and (max-width: 480px) {
        .tele-directory h1 {
            font-size: 1.8rem;
        }

        .tele-directory table {
            font-size: 0.85rem;
        }

        .tele-directory th,
        .tele-directory td {
            padding: 10px 8px;
        }
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

    @media (prefers-reduced-motion: reduce) {
        .tele-directory tbody tr {
            transition: none;
        }

        .tele-directory .table-container {
            animation: none;
        }
    }

    @media (prefers-contrast: high) {
        .tele-directory th {
            background: #0D2819;
            color: white;
        }

        .tele-directory td {
            border-bottom: 2px solid #000;
        }
    }
</style>

<div class="tele-directory">
    <div class="container">
        <h1>AWARDS AND ACHIEVEMENTS</h1>

        <!-- <div class="search-box">
            <input type="text" id="tableSearch" placeholder="Search by rank, name, appointment, BR, DOS, TOS, NFS or intercom">
        </div> -->

        <div class="table-container">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <!-- <th>Rank</th> -->
                            <th>AWARDS</th>
                            <th>NUMBERS</th>
                            <!-- <th>BR</th> -->
                            <!-- <th>DOS</th>
                            <th>TOS</th>
                            <th>NFS</th>
                            <th>Intercom</th> -->
                        </tr>
                    </thead>
                    <tbody id="directoryTableBody">
                        @if(isset($telDirs) && $telDirs->count() > 0)
                            @foreach($telDirs as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <!-- <td>{{ $item->rank }}</td> -->
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->appointment }}</td>
                                    <!-- <td>{{ $item->br }}</td> -->
                                    <!-- <td>{{ $item->dos }}</td>
                                    <td>{{ $item->tos }}</td>
                                    <td>{{ $item->nfs }}</td>
                                    <td>{{ $item->intercom }}</td> -->
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-data-row">
                                <td colspan="9" style="text-align:center;padding:20px;">No records found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div id="noSearchResult" class="no-search-result">
                    No matching records found.
                </div>
            </div>
        </div>
    </div>
</div>


@endsection