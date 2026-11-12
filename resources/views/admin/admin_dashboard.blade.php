@extends('admin.index')

@section('after-style')
<link rel="stylesheet" href="{{asset('public/dist/css/admin-dashboard-pie.css')}}">
@endsection

@section('after-scripts')

<script nonce="{{ app('cspNonce') }}">

$(function () {
    

    function renderModuleRing(config) {

        var tpl = $('#' + config.templateId);

        var items = tpl.find('a.module-link');

        if (!items.length) return;

        var gradientParts = [];

        var segments = [];

        var cum = 0;

        items.each(function () {

            var p = parseFloat($(this).data('percent')) || 0;

            var color = $(this).data('color') || '#ccc';

            var name = $(this).text().trim();

            var href = $(this).attr('href') || '#';

            var start = cum;

            var end = cum + p;

            gradientParts.push(color + ' ' + start + '% ' + end + '%');

            segments.push({

                start: start,

                end: end,

                color: color,

                name: name,

                href: href

            });

            cum = end;

        });

        if (cum < 100) {

            gradientParts.push('#e9ecef ' + cum + '% 100%');

        }

        var ring = $('#' + config.ringId);

        ring.css('--ring-gradient', gradientParts.join(', '));

        var title = ring.closest('.module-card').find('.module-title');

        var titleText = title.text().replace(/\\(\d+\\)/g, '').trim();

        title.text(titleText + '(' + items.length + ')');

        if (!$('#ring-tooltip').length) {

            $('body').append(`

                <div id="ring-tooltip" class="ring-tooltip">

                    <div class="title"></div>

                    <div class="small text-muted">Click to open list</div>

                </div>

            `);

        }

        var tooltip = $('#ring-tooltip');

        function getSegmentByMouse(e) {

            var offset = ring.offset();

            var ringW = ring.outerWidth();

            var ringH = ring.outerHeight();

            var cx = offset.left + ringW / 2;

            var cy = offset.top + ringH / 2;

            var dx = e.pageX - cx;

            var dy = e.pageY - cy;

            var distance = Math.sqrt(dx * dx + dy * dy);

            if (distance > ringW / 2 || distance < 42) {

                return null;

            }

            var angle = Math.atan2(dy, dx) * (180 / Math.PI);

            var percent = ((angle + 90) / 360) * 100;

            if (percent < 0) percent += 100;

            for (var i = 0; i < segments.length; i++) {

                if (percent >= segments[i].start && percent < segments[i].end) {

                    return segments[i];

                }

            }

            return null;

        }

        ring.off('mousemove.' + config.key).on('mousemove.' + config.key, function (e) {

            var seg = getSegmentByMouse(e);

            if (!seg) {

                tooltip.hide();

                ring.removeClass('hover-active');

                return;

            }

            ring.addClass('hover-active');

            var offset = ring.offset();

            var x = ((e.pageX - offset.left) / ring.outerWidth()) * 100;

            var y = ((e.pageY - offset.top) / ring.outerHeight()) * 100;

            ring.css('--x', x + '%');

            ring.css('--y', y + '%');

            tooltip.find('.title').text(seg.name);

            tooltip.css({

                left: e.pageX + 15,

                top: e.pageY + 15,

                display: 'block',

                borderTop: '4px solid ' + seg.color

            });

        });

        ring.off('mouseleave.' + config.key).on('mouseleave.' + config.key, function () {

            tooltip.hide();

            ring.removeClass('hover-active');

        });

        ring.off('click.' + config.key).on('click.' + config.key, function (e) {

            var seg = getSegmentByMouse(e);

            if (seg && seg.href) {

                window.location.href = seg.href;

            }

        });

    }

    // Hide cards that have no permitted child links.

    $('[id^="template-"]').each(function () {

        var template = $(this);

        if (!template.find('a.module-link').length) {

            var id = template.attr('id').replace('template-', '');

            var ringMap = {

                'home': 'home-ring-card', 'cosco': 'cosco-ring-card', 'fp': 'fp-ring-card',

                'exam': 'exam-ring-card', 'knowledge': 'knowledge-ring-card', 'section': 'section-ring-card',

                'bulletin': 'bulletin-ring-card', 'study': 'study-ring-card', 'mtech': 'mtech-ring-card',

                'place-detail': 'place-detail-ring-card', 'organogram': 'organogram-ring-card',

                'branch': 'branch-ring-card', 'hoddetail': 'hoddetail-ring-card', 'teldir': 'teldir-ring-card',

                'awards': 'awards-ring-card', 'resource': 'resource-ring-card', 'goto': 'goto-ring-card'

            };

            if (ringMap[id]) {

                $('#' + ringMap[id]).closest('[class*="col-"]').hide();

            }

        }

    });

    renderModuleRing({ key: 'home', ringId: 'home-ring-card', templateId: 'template-home' });

    renderModuleRing({ key: 'awards', ringId: 'awards-ring-card', templateId: 'template-awards' });

    renderModuleRing({ key: 'knowledge', ringId: 'knowledge-ring-card', templateId: 'template-knowledge' });

    renderModuleRing({ key: 'mtech', ringId: 'mtech-ring-card', templateId: 'template-mtech' });

    renderModuleRing({ key: 'organogram', ringId: 'organogram-ring-card', templateId: 'template-organogram' });

    renderModuleRing({ key: 'branch', ringId: 'branch-ring-card', templateId: 'template-branch' });

    renderModuleRing({ key: 'hoddetail', ringId: 'hoddetail-ring-card', templateId: 'template-hoddetail' });

    renderModuleRing({ key: 'teldir', ringId: 'teldir-ring-card', templateId: 'template-teldir' });

    renderModuleRing({ key: 'resource', ringId: 'resource-ring-card', templateId: 'template-resource' });

// ====================================================
// ADMIN WELCOME POPUP - OPEN AND CLOSE FIX
// ====================================================

const welcomeModal = document.getElementById('adminWelcomeModal');

if (welcomeModal) {

    function showWelcomePopup() {

        // Bootstrap 5
        if (window.bootstrap && typeof bootstrap.Modal === 'function') {

            const modal = bootstrap.Modal.getOrCreateInstance(welcomeModal, {
                backdrop: 'static',
                keyboard: false
            });

            modal.show();

        }
        // Bootstrap 4
        else if ($.fn.modal) {

            $('#adminWelcomeModal').modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

        } else {
            console.error('Bootstrap Modal library is not loaded.');
        }
    }

    function hideWelcomePopup() {

        // Bootstrap 5
        if (window.bootstrap && typeof bootstrap.Modal === 'function') {

            const modal = bootstrap.Modal.getInstance(welcomeModal);

            if (modal) {
                modal.hide();
            }

        }
        // Bootstrap 4
        else if ($.fn.modal) {

            $('#adminWelcomeModal').modal('hide');

        }

    }

    // Show popup on dashboard load
    showWelcomePopup();

    // Close button functionality
    $('#adminWelcomeModal')
        .off('click.adminWelcome', '.admin-popup-close')
        .on('click.adminWelcome', '.admin-popup-close', function (e) {

            e.preventDefault();
            e.stopPropagation();

            hideWelcomePopup();

        });

}

});

</script>

@endsection

@section('content')

@php

    // Admin dashboard: all modules available.

    $canViewMenu = function ($url) {

        return true;

    };

@endphp
{{-- ADMIN WELCOME POPUP --}}

<div class="modal fade"
     id="adminWelcomeModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="adminWelcomeModalLabel"
     aria-hidden="true"
     data-backdrop="static"
     data-keyboard="false">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content border-0 shadow-lg rounded-lg">

            <div class="modal-header bg-info text-white">

                <h5 class="modal-title font-weight-bold"
                    id="adminWelcomeModalLabel">

                    <i class="fas fa-shield-alt mr-2"></i>
                    Welcome to Admin Panel

                </h5>

              <button type="button"
        class="close text-white admin-popup-close"
        aria-label="Close">

    <span aria-hidden="true">&times;</span>

</button>

            </div>

            <div class="modal-body text-center p-4">

                <div class="mb-3">

                    <i class="fas fa-user-shield fa-4x text-primary"></i>

                </div>

                <h4 class="font-weight-bold text-dark mb-3">
                    Welcome, Administrator!
                </h4>

                <p class="text-muted">

                    You have successfully entered the
                    Administration Management Panel.

                </p>

                <p class="text-muted">

                    Manage DGTA, Organogram, TA Units,
                    Awards, Resources and other modules
                    from your dashboard.

                </p>
<button type="button"
        class="btn btn-primary px-4 mt-3 admin-popup-close">

    <i class="fas fa-arrow-right mr-2"></i>
    Go to Dashboard

</button>

            </div>

            <div class="modal-footer justify-content-center bg-light">

                <small class="text-muted">
                    Administration Management System
                </small>

            </div>

        </div>

    </div>

</div>
<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-12">

                    <!-- <h1 class="m-0 text-dark welcome-heading">Welcome to Admin Dashboard</h1> -->

                </div>

            </div>

        </div>

    </div>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <!-- Home Page Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-eaf2ff card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="home-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="fas fa-home fa-2x text-primary"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Home Page Modules</h5>

                        </div>

                    </div>

                </div>

                <!-- Knowledge Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-e6fbff card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="knowledge-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="dashboard-color-17a2b8 fas fa-book fa-2x"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Manage TA/Units</h5>

                        </div>

                    </div>

                </div>

                <!-- M.Tech Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-f0eaff card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="mtech-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="dashboard-color-7952b3 fas fa-university fa-2x"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Manage TA/REACT</h5>

                        </div>

                    </div>

                </div>

                <!-- Organogram Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-e8edff card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="organogram-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="dashboard-color-0d6efd fas fa-sitemap fa-2x"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Manage Organogram</h5>

                        </div>

                    </div>

                </div>

                <!-- Branch Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-edfbe7 card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="branch-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="dashboard-color-198754 fas fa-code-branch fa-2x"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Manage Branch</h5>

                        </div>

                    </div>

                </div>

                <!-- Hod Details Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-fbe8ff card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="hoddetail-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="dashboard-color-6f42c1 fas fa-user-cog fa-2x"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Manage DGTA Details</h5>

                        </div>

                    </div>

                </div>

                <!-- Tel Dir Modules Card -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                    <div class="dashboard-background-fff0f0 card module-card">

                        <div class="card-body text-center">

                            <div class="home-ring-wrap mb-2">

                                <div id="teldir-ring-card" class="progress-ring">

                                    <div class="ring-center">

                                        <i class="dashboard-color-dc3545 fas fa-phone-alt fa-2x"></i>

                                    </div>

                                </div>

                            </div>

                            <h5 class="module-title mt-2">Manage Tel Dir</h5>

                        </div>

                    </div>

                </div>

                <!-- Resource Modules Card -->

<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

    <div class="dashboard-background-eef7ff card module-card">

        <div class="card-body text-center">

            <div class="home-ring-wrap mb-2">

                <div id="resource-ring-card" class="progress-ring">

                    <div class="ring-center">

                        <i class="dashboard-color-0d6efd fas fa-box-open fa-2x"></i>

                    </div>

                </div>

            </div>

            <h5 class="module-title mt-2">Manage TA Rules/Policy</h5>

        </div>

    </div>

</div>

                <!-- Awards Modules Card -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card module-card dashboard-awards-card">
                        <div class="card-body text-center">
                            <div class="home-ring-wrap mb-2">
                                <div id="awards-ring-card" class="progress-ring">
                                    <div class="ring-center">
                                        <i class="fas fa-trophy fa-2x dashboard-awards-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <h5 class="module-title mt-2">Manage Awards</h5>
                        </div>
                    </div>
                </div>


                <!-- Module Distribution: dynamic database-record counts, server-rendered SVG -->
                @php
                    /*
                     * Configure the REAL tables used by each module here.
                     * For each screen, the first existing candidate is counted.
                     * These names are inferred from dashboard links: verify them
                     * against the database/schema before trusting percentages.
                     */
                    $distributionModules = [
                        [
                            'name' => 'Home Page Modules',
                            'color' => '#007bff',
                            'sources' => [
                                'DGTA' => ['hods', 'hod'],
                                'Banner' => ['banners', 'banner'],
                                'Whats New' => ['whats_new', 'whats_news', 'new_updates', 'latest_news', 'new'],
                                'Applications' => ['applications', 'application'],
                                'Milestone' => ['milestones', 'milestone', 'news'],
                            ],
                        ],
                        [
                            'name' => 'Manage TA/Units',
                            'color' => '#17a2b8',
                            'sources' => [
                                'TA Units' => ['knowledge_categories', 'knowledge_category', 'ta_units', 'ta_unit'],
                            ],
                        ],
                        [
                            'name' => 'Manage TA/REACT',
                            'color' => '#7952b3',
                            'sources' => [
                                'TA/REACT' => ['gates', 'gate', 'ta_react', 'react'],
                                'TA/REACT PDF' => ['gate_pdfs', 'gate_pdf', 'ta_react_pdfs'],
                            ],
                        ],
                        [
                            'name' => 'Manage Organogram',
                            'color' => '#0d6efd',
                            'sources' => [
                                'Organogram' => ['organograms', 'organogram', 'users'],
                            ],
                        ],
                        [
                            'name' => 'Manage Branch',
                            'color' => '#198754',
                            'sources' => [
                                'Branch' => ['branches', 'branch'],
                            ],
                        ],
                        [
                            'name' => 'Manage DGTA Details',
                            'color' => '#6f42c1',
                            'sources' => [
                                'DGTA Details' => ['hods', 'hod'],
                            ],
                        ],
                        [
                            'name' => 'Manage Tel Dir',
                            'color' => '#dc3545',
                            'sources' => [
                                'Tel Dir' => ['telephone_directories', 'telephone_directory', 'tel_dirs', 'tel_dir', 'teldirs', 'teldir'],
                            ],
                        ],
                        [
                            'name' => 'Manage TA Rules/Policy',
                            'color' => '#0dcaf0',
                            'sources' => [
                                'TA RULE/POLICY' => ['resources', 'resource', 'ta_rules', 'ta_rule'],
                                'TA RULE/POLICY PDF' => ['resource_pdfs', 'resource_pdf', 'ta_rule_pdfs', 'ta_rule_pdf'],
                            ],
                        ],
                        [
                            'name' => 'Manage Awards',
                            'color' => '#d49a00',
                            'sources' => [
                                'Awards' => ['awards', 'award'],
                            ],
                        ],
                    ];

                    $distributionTotal = 0;
                    $distributionMissing = [];
                    $distributionTableExists = [];
                    $distributionCountCache = [];

                    foreach ($distributionModules as &$module) {
                        $module['count'] = 0;
                        $module['incomplete'] = false;

                        foreach ($module['sources'] as $sourceName => $candidates) {
                            $selectedTable = null;

                            foreach ($candidates as $candidate) {
                                if (!array_key_exists($candidate, $distributionTableExists)) {
                                    $distributionTableExists[$candidate] = \Illuminate\Support\Facades\Schema::hasTable($candidate);
                                }
                                if ($distributionTableExists[$candidate]) {
                                    $selectedTable = $candidate;
                                    break;
                                }
                            }

                            if ($selectedTable === null) {
                                $module['incomplete'] = true;
                                $distributionMissing[] = $sourceName;
                            } else {
                                if (!array_key_exists($selectedTable, $distributionCountCache)) {
                                    $distributionCountCache[$selectedTable] = (int) \Illuminate\Support\Facades\DB::table($selectedTable)->count();
                                }
                                $module['count'] += $distributionCountCache[$selectedTable];
                            }
                        }

                        $distributionTotal += $module['count'];
                    }
                    unset($module);

                    foreach ($distributionModules as &$module) {
                        $module['percentage'] = $distributionTotal > 0
                            ? ($module['count'] * 100 / $distributionTotal)
                            : 0;
                        $module['perRecordPercentage'] = $module['count'] > 0
                            ? (100 / $module['count'])
                            : 0;
                    }
                    unset($module);

                    $distributionStartAngle = -90;
                @endphp

                <div class="col-12 col-lg-9 mb-3">
                    <div class="card module-card dashboard-distribution-card">
                        <div class="card-body">
                            <h5 class="dashboard-distribution-title">Module Distribution (%)</h5>
                            <div class="dashboard-distribution-layout">
                                <div class="dashboard-distribution-visual">
                                    <svg class="dashboard-distribution-svg" width="180" height="180" viewBox="0 0 200 200" role="img" aria-label="Pie chart showing the relative share of each dashboard module by database record count">
                                        <circle cx="100" cy="100" r="88" fill="#e9ecef" />
                                        @foreach ($distributionModules as $module)
                                            @if ($module['percentage'] > 0)
                                                @if ($module['percentage'] >= 100)
                                                    <circle cx="100" cy="100" r="88" fill="{{ $module['color'] }}">
                                                        <title>{{ $module['name'] }}: {{ $module['count'] }} records (100%); each record represents {{ number_format($module['perRecordPercentage'], 1) }}% of this module</title>
                                                    </circle>
                                                @else
                                                    @php
                                                        $distributionSweep = 360 * $module['percentage'] / 100;
                                                        $distributionEndAngle = $distributionStartAngle + $distributionSweep;
                                                        $distributionStartX = 100 + 88 * cos(deg2rad($distributionStartAngle));
                                                        $distributionStartY = 100 + 88 * sin(deg2rad($distributionStartAngle));
                                                        $distributionEndX = 100 + 88 * cos(deg2rad($distributionEndAngle));
                                                        $distributionEndY = 100 + 88 * sin(deg2rad($distributionEndAngle));
                                                        $distributionArc = $distributionSweep > 180 ? 1 : 0;
                                                        $distributionPath = sprintf(
                                                            'M 100 100 L %.4f %.4f A 88 88 0 %d 1 %.4f %.4f Z',
                                                            $distributionStartX,
                                                            $distributionStartY,
                                                            $distributionArc,
                                                            $distributionEndX,
                                                            $distributionEndY
                                                        );
                                                    @endphp
                                                    <path d="{{ $distributionPath }}" fill="{{ $module['color'] }}">
                                                        <title>{{ $module['name'] }}: {{ $module['count'] }} records ({{ number_format($module['percentage'], 1) }}%); each record represents {{ number_format($module['perRecordPercentage'], 1) }}% of this module</title>
                                                    </path>
                                                @endif
                                                @php
                                                    $distributionStartAngle += 360 * $module['percentage'] / 100;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </svg>
                                    <div class="dashboard-distribution-center">
                                        <span class="dashboard-distribution-total">{{ $distributionTotal }}</span>
                                        <span class="dashboard-distribution-caption">Total Records</span>
                                    </div>
                                </div>
                                <div class="dashboard-distribution-legend">
                                    @foreach ($distributionModules as $module)
                                        <div class="dashboard-distribution-item" title="{{ $module['name'] }}: {{ $module['count'] }} records; {{ $module['count'] > 0 ? number_format($module['perRecordPercentage'], 1) . '% per record within module' : 'No records in mapped tables' }}{{ $module['incomplete'] ? ' (check table mapping)' : '' }}">
                                            <span class="dashboard-distribution-swatch" aria-hidden="true"></span>
                                            <span class="dashboard-distribution-label">{{ $module['name'] }} ({{ $module['count'] }})</span>
                                            <span class="dashboard-distribution-value">{{ number_format($module['percentage'], 1) }}%</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if (!empty($distributionMissing))
                                <small class="text-warning d-block mt-2">Check actual database table names for: {{ implode(', ', array_unique($distributionMissing)) }}. Percentages exclude any unmapped records.</small>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Hidden Awards Template -->
                <div class="d-none" id="template-awards">
                    @if($canViewMenu('awards_list'))
                        <a href="{{ url('admin/award_list') }}" class="module-link" data-percent="100" data-color="#d49a00">Awards</a>
                    @endif
                </div>

                <!-- Hidden Home Template -->

                <div class="d-none" id="template-home">

                    @if($canViewMenu('hod_list'))

                        <a href="{{ url('admin/hod_list') }}" class="module-link" data-percent="20" data-color="#6610f2">DGTA</a>

                    @endif

                    @if($canViewMenu('banner_list'))

                        <a href="{{ url('admin/banner_list') }}" class="module-link" data-percent="20" data-color="#007bff">Banner</a>

                    @endif

                    @if($canViewMenu('new_list'))

                        <a href="{{ url('admin/new_list') }}" class="module-link" data-percent="20" data-color="#ffc107">Whats New</a>

                    @endif

                    @if($canViewMenu('application_list'))

                        <a href="{{ url('admin/application_list') }}" class="module-link" data-percent="20" data-color="#28a745">Applications</a>

                    @endif

                    @if($canViewMenu('news_list'))

                        <a href="{{ url('admin/news_list') }}" class="module-link" data-percent="20" data-color="#dc3545">Milestone</a>

                    @endif

                </div>

                <!-- Hidden Knowledge Template -->

                <div class="d-none" id="template-knowledge">

                    @if($canViewMenu('knowledge_category_list'))

                        <a href="{{ url('admin/knowledge_category_list') }}" class="module-link" data-percent="100" data-color="#17a2b8">TA Units</a>

                    @endif

                </div>

                <!-- Hidden M.Tech Template -->

                <div class="d-none" id="template-mtech">

                    @if($canViewMenu('gate_list'))

                        <a href="{{ url('admin/gate_list') }}" class="module-link" data-percent="50" data-color="#7952b3">TA/REACT</a>

                    @endif

                    @if($canViewMenu('gate_pdf_list'))

                        <a href="{{ url('admin/gate_pdf_list') }}" class="module-link" data-percent="50" data-color="#0d6efd">TA/REACT PDF</a>

                    @endif

                </div>

                <!-- Hidden Organogram Template -->

                <div class="d-none" id="template-organogram">

                    @if($canViewMenu('users-list'))

                        <a href="{{ url('admin/users-list') }}" class="module-link" data-percent="100" data-color="#0d6efd">Organogram</a>

                    @endif

                </div>

                <!-- Hidden Branch Template -->

                <div class="d-none" id="template-branch">

                    @if($canViewMenu('branch_list'))

                        <a href="{{ url('admin/branch_list') }}" class="module-link" data-percent="100" data-color="#198754">Branch</a>

                    @endif

                </div>

                <!-- Hidden Hod Details Template -->

                <div class="d-none" id="template-hoddetail">

                    @if($canViewMenu('hod_detail_list'))

                        <a href="{{ url('admin/dgta_list') }}" class="module-link" data-percent="100" data-color="#6f42c1">DGTA Details</a>

                    @endif

                </div>

                <!-- Hidden Tel Dir Template -->

                <div class="d-none" id="template-teldir">

                    @if($canViewMenu('teldir_list'))

                        <a href="{{ url('admin/teldir_list') }}" class="module-link" data-percent="100" data-color="#dc3545">Tel Dir</a>

                    @endif

                </div>

                <!-- Hidden Resource Template -->

<div class="d-none" id="template-resource">

    @if($canViewMenu('resources_list'))

        <a href="{{ url('admin/resources_list') }}" class="module-link" data-percent="50" data-color="#0d6efd">TA RULE/POLICY</a>

    @endif

    @if($canViewMenu('resource_pdf_list'))

        <a href="{{ url('admin/resource_pdf_list') }}" class="module-link" data-percent="50" data-color="#dc3545">TA RULE/POLICY PDF</a>

    @endif

</div>

        </div>
    </div>
</section>
</div>

@endsection