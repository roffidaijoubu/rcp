<div class="drawer">
    <input id="left-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- right drawer -->
        <div class="drawer drawer-end">
            <input id="right-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <!-- Page content here -->
                {{ $main_content }}
            </div>
            <div class="drawer-side">
                <label for="right-drawer" class="drawer-overlay"></label>
                <div class="min-h-full w-80 bg-base-200 text-base-conten">
                    {{ $right_drawer }}
                </div>
            </div>
        </div>
        <!-- /right drawer -->
    </div>
    <div class="drawer-side">
        <label for="left-drawer" class="drawer-overlay"></label>
        <div class="min-h-full w-80 bg-base-200 text-base-conten">
            {{ $left_drawer ?? '' }}
        </div>
    </div>
</div>
