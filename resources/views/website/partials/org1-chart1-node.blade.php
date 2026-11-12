<div class="level">
    @if(count($level['children']) == 0)
        <div class="employee-card ceo-card">
            <div class="employee-image">
                <img src="{{ $level['profile_image'] }}">
            </div>
            <div class="employee-name">{{ $level['name'] }}</div>
            <div class="employee-role">{{ $level['designation'] }}</div>
        </div>
    @else
        <div class="department-section">
            <div class="employee-card department-card"
                 onclick="toggleTeam('team-{{ $level['id'] }}', this)">
                <div class="expand-indicator">▼</div>
                <div class="employee-image">
                    <img src="{{ $level['profile_image'] }}">
                </div>
                <div class="employee-name">{{ $level['name'] }}</div>
                <div class="employee-role">{{ $level['designation'] }}</div>
            </div>

            <div class="team-container" id="team-{{ $level['id'] }}">
                <div class="arrow-container">
                    <div class="arrow">⬇</div>
                </div>

                <div class="team-members">
                    @foreach($level['children'] as $child)
                        @include('website.partials.org-chart-node', ['level' => $child])
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>

