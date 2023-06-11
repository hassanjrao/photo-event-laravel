
<div class="container-xxl py-5">
    <div class="container">

        <ul class="nav nav-tabs">
            <li class="nav-item" style="cursor: pointer;">
                <a class="nav-link {{ $activeTab == 'profileTab' ? 'active' : '' }}" aria-current="page"
                    wire:click='changeTab("profileTab")'>Profile</a>
            </li>
            <li class="nav-item" style="cursor: pointer;">
                <a class="nav-link {{ $activeTab == 'bookingTab' ? 'active' : '' }}"
                    wire:click='changeTab("bookingTab")'>Bookings</a>
            </li>

        </ul>

        <div class="tab-content my-5">
            <div class="tab-pane fade {{ $activeTab == 'profileTab' ? 'show active' : '' }}" id="profileTab" role="tabpanel"
                aria-labelledby="profile-tab">
                <livewire:profile.account>
            </div>
            <div class="tab-pane fade {{ $activeTab == 'bookingTab' ? 'show active' : '' }}" id="bookingTab" role="tabpanel"
                aria-labelledby="booking-tab">
                <livewire:profile.bookings :bookings="$bookings">
            </div>

        </div>

    </div>
</div>
