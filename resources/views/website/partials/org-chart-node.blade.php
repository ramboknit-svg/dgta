@if(count($level['children']) === 0)

    <div class="employee-card">

        <div class="employee-image">
            <img src="{{ $level['profile_image'] }}">
        </div>

        <div class="employee-name">
            {{ $level['name'] }}
        </div>

        <div class="employee-role">
            {{ $level['designation'] }}
        </div>

    </div>

@else

    <div class="department-section">

        <div class="employee-card department-card"
             role="button" tabindex="0" aria-expanded="false">

            <span class="expand-indicator">▼</span>

            <div class="employee-image">
                <img src="{{ $level['profile_image'] }}">
            </div>

            <div class="employee-name">
                {{ $level['name'] }}
            </div>

            <div class="employee-role">
                {{ $level['designation'] }}
            </div>

        </div>

        <div class="team-container">

            <div class="arrow-container">
                <span class="arrow">⬇</span>
            </div>

            <div class="team-members">

                @foreach($level['children'] as $child)

                    <div class="child-item">

                        @include(
                            'website.partials.org-chart-node',
                            ['level' => $child]
                        )

                    </div>

                @endforeach

            </div>

        </div>

    </div>

@endif