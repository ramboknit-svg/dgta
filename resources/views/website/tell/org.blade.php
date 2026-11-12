@extends('website.app_new')

@section('content')

<style nonce="{{ app('cspNonce') }}">
/* Main container */
.og-section {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding: 30px 0;
   
}

.org-chart {
    display: flex;
    flex-direction: column;
    gap: 40px;
    width: 100%;
}

/* Row of cards */
.level {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 30px;
    flex-wrap: wrap;
}

/* Department section wrapper */
/* .department-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
} */

    .department-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;

    width: 140px;
    min-width: 140px;
    max-width: 140px;
}

/* Employee card */
.employee-card {
    background: rgb(24 66 43);
    border-radius: 18px;
    padding: 8px 6px;
    text-align: center;
    min-width: 120px;
    max-width: 140px;
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    transition: transform 0.25s;
    z-index: 10;
}

.employee-card:hover {
    transform: translateY(-6px);
}

/* Employee image */
.employee-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 4px;
    border: 4px solid #fff;
}

.employee-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Name & role */
.employee-name {
    color: #fff;
    font-weight: 700;
    font-size: 12px;
}

.employee-role {
    color: #f3f3f3;
    font-size: 11px;
}

/* Expand indicator */
.expand-indicator {
    position: absolute;
    top: 6px;
    right: 15px;
    color: #fff;
    font-size: 12px;
    transition: transform 0.3s ease;
}

.expand-indicator.rotated {
    transform: rotate(180deg);
}

/* Team container */
/* .team-container {
    display: none;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-top: 15px;
}

.team-container.show {
    display: flex;
} */


.team-container {
    display: none;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-top: 15px;

    width: 100vw;
   
    box-sizing: border-box;
}

.team-container.show {
    display: flex;
}

.team-members {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: nowrap;
    width: max-content;
    min-width: 100%;
}

.team-members > * {
    flex: 0 0 auto;
}



/* 
    .team-container {
    display: none;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    margin-top: 15px;

    width: 420px;
}

.team-container.show {
    display: flex;
} */

/* Team members row */
/* .team-members {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
} */
/* Team members row */
/* .team-members {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: nowrap;
    width: max-content;
}

.team-members > * {
    flex: 0 0 auto;
} */
/* Arrow between parent and children */
.arrow-container {
    display: flex;
    justify-content: center;
    width: 100%;
}

.arrow {
    font-size: 20px;
    color: rgb(13 40 25);
}

/* Responsive */
@media (max-width: 768px) {
    .employee-card {
        min-width: 140px;
        max-width: 180px;
    }
}
/* ================================
   ROOT LEVEL CARDS
================================ */
.root-item {
    width: 140px;
    min-width: 140px;
    max-width: 140px;
    flex: 0 0 140px;

    display: flex;
    justify-content: center;
    align-items: flex-start;
}
/* .root-level {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 30px;
    flex-wrap: wrap;
} */

.root-item {
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

/*
    If exactly 3 root cards exist:

    Database/array order:
    1 = existing/main card
    2 = new card
    3 = new card

    Screen order:
    2   1   3
*/
.three-root-cards .root-item:nth-child(1) {
    order: 2;
  
}

.three-root-cards .root-item:nth-child(2) {
    order: 1;
      margin-top: 65px; /* Optional: Adjust vertical alignment if needed */
}

.three-root-cards .root-item:nth-child(3) {
    order: 3;
    margin-top: 65px; /* Optional: Adjust vertical alignment if needed */
}

</style>

<div class="org-main">
<h2 class="org-team">DGTA Management Team</h2>

<div class="og-section">
    
    <!-- <div class="org-chart">
        @foreach($orgChart as $level)
            @include('website.partials.org-chart-node', ['level' => $level])
        @endforeach
    </div> -->
    <div class="org-chart">

    <div class="level root-level {{ count($orgChart) == 3 ? 'three-root-cards' : '' }}">

        @foreach($orgChart as $level)

            <div class="root-item">

                @include('website.partials.org-chart-node', [
                    'level' => $level
                ])

            </div>

        @endforeach

    </div>

</div>
</div>
</div>
<script nonce="{{ app('cspNonce') }}">
(function () {
    'use strict';

    // Only select the team owned by this department, not a nested child's team.
    function ownChild(section, className) {
        return Array.from(section.children).find(el => el.classList.contains(className)) || null;
    }

    function closeDepartment(section) {
        const team = ownChild(section, 'team-container');
        const card = ownChild(section, 'department-card');
        if (team) team.classList.remove('show');
        if (card) {
            const indicator = card.querySelector('.expand-indicator');
            if (indicator) indicator.classList.remove('rotated');
            card.setAttribute('aria-expanded', 'false');
        }
        // Reset nested expanded branches when their parent is closed.
        if (team) team.querySelectorAll('.department-section').forEach(child => {
            const childTeam = ownChild(child, 'team-container');
            const childCard = ownChild(child, 'department-card');
            if (childTeam) childTeam.classList.remove('show');
            if (childCard) {
                const arrow = childCard.querySelector('.expand-indicator');
                if (arrow) arrow.classList.remove('rotated');
                childCard.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function openDepartment(section) {
        const team = ownChild(section, 'team-container');
        const card = ownChild(section, 'department-card');
        if (!team) return;
        team.classList.add('show');
        if (card) {
            const indicator = card.querySelector('.expand-indicator');
            if (indicator) indicator.classList.add('rotated');
            card.setAttribute('aria-expanded', 'true');
        }
    }

    function toggleTeam(card) {
        const section = card.closest('.department-section');
        if (!section) return;
        const team = ownChild(section, 'team-container');
        if (!team) return;
        const wasOpen = team.classList.contains('show');

        // Close siblings at this same hierarchy level, preserving open parents.
        const parentRow = section.closest('.team-members') || section.closest('.root-level');
        if (parentRow) {
            Array.from(parentRow.children).forEach(item => {
                const sibling = item.classList.contains('department-section')
                    ? item : item.querySelector('.department-section');
                if (sibling && sibling !== section) closeDepartment(sibling);
            });
        }

        if (wasOpen) closeDepartment(section);
        else openDepartment(section);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const chart = document.querySelector('.org-chart');
        if (!chart) return;

        // Event delegation works for all recursive Blade child cards.
        chart.addEventListener('click', function (event) {
            const card = event.target.closest('.department-card');
            if (card && chart.contains(card)) toggleTeam(card);
        });

        chart.addEventListener('keydown', function (event) {
            if (event.key !== 'Enter' && event.key !== ' ') return;
            const card = event.target.closest('.department-card');
            if (!card || card !== event.target || !chart.contains(card)) return;
            event.preventDefault();
            toggleTeam(card);
        });

        // Preserve original behavior: open the first root department on load.
        const firstRoot = chart.querySelector('.root-level > .root-item');
        if (firstRoot) {
            const firstDept = firstRoot.querySelector('.department-section');
            if (firstDept) openDepartment(firstDept);
        }
    });
})();
</script>



@endsection
