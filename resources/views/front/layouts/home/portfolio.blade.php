<section id="projects" x-data="{
    currentFilter: new URLSearchParams(window.location.search).get('filter') || 'all',
    isLoading: false,
    isExpanded: false, // Track if we are showing all or just 6
    activeClasses: 'bf _h',
    inactiveClasses: 'vi aj',

    reinitializeAnimations() {
        if (typeof ScrollReveal !== 'undefined') {
            ScrollReveal().reveal('.animate_top', {
                delay: 200,
                distance: '50px',
                origin: 'top',
                interval: 100
            });
        }
    },

    filterProjects(filter) {
        this.isLoading = true;
        this.currentFilter = filter;
        this.isExpanded = false; // Reset to '6 view' when changing categories

        fetch(`${window.location.pathname}?filter=${filter}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('ajax-projects-container').innerHTML = html;
                this.reinitializeAnimations();
            })
            .finally(() => { this.isLoading = false; });
    },

    toggleProjects() {
        // If we haven't loaded all yet, fetch them
        if (!this.isExpanded) {
            this.isLoading = true;
            const params = new URLSearchParams();
            params.set('filter', this.currentFilter);
            params.set('load_all', 'true');

            fetch(`${window.location.pathname}?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('ajax-projects-container').innerHTML = html;
                    this.isExpanded = true;
                    this.reinitializeAnimations();
                })
                .finally(() => { this.isLoading = false; });
        } else {
            // If already expanded, just go back to the filtered view (which defaults to 6)
            this.filterProjects(this.currentFilter);
            this.isExpanded = false;
        }
    }
}" class="tg wm sn ug xm tn">

    @if (Route::is('team'))
        <div class="-ud-mx-4 sb wd" bis_skin_checked="1">
            <div class="oc tf" bis_skin_checked="1">
                <div class="animate_top la ib kd yg" data-sr-id="8"
                    style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2.8s cubic-bezier(0.5, 0, 0, 1), transform 2.8s cubic-bezier(0.5, 0, 0, 1);"
                    bis_skin_checked="1">
                    <h2 class="yh va bh lh lk ll ">
                        Portfolio Of {{ Str::title($user->name) }}
                    </h2>
                </div>
            </div>
        </div>
    @else
        <div class="-ud-mx-4 sb wd" bis_skin_checked="1">
            <div class="oc tf" bis_skin_checked="1">
                <div class="animate_top la ib kd yg" data-sr-id="8"
                    style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2.8s cubic-bezier(0.5, 0, 0, 1), transform 2.8s cubic-bezier(0.5, 0, 0, 1);"
                    bis_skin_checked="1">
                    <span class="yh ta qb ah nh">
                        Our Portfolio
                    </span>
                    <h2 class="zh mj va bh lh lk ll">
                        Our Recent Projects
                    </h2>
                    <p>
                        We deliver reliable solutions for all kinds of businesses. Choose yours and take your success to the next level.
                    </p>
                </div>
            </div>
        </div>
        <div class="-ud-mx-4 sb wd yd">
            <div class="oc tf">
                <ul class="animate_top eb sb wd yd he">
                    <li class="jb">
                        <button @click="filterProjects('all')"
                            :class="currentFilter === 'all' ? activeClasses : inactiveClasses"
                            class="filter-btn rb ne yf zf yg nh li il lm">All</button>
                    </li>
                    <template x-for="cat in ['Laravel', 'PHP', 'MERN', 'Themes']">
                        <li class="jb">
                            <button @click="filterProjects(cat)"
                                :class="currentFilter === cat ? activeClasses : inactiveClasses"
                                class="filter-btn rb ne yf zf yg nh li il lm" x-text="cat"></button>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    @endif

    <div class="-ud-mx-4 sb wd productcard" id="ajax-projects-container" style="transition: opacity 0.3s ease;">
        @include('front.partials.project_cards')
    </div>
    @if ($projects->count() < 7)
        <div style="display:hidden;"></div>
        @else
        <div class="project-button oc tf jb" style="margin-top: 40px; text-align: center;">
        <button @click="toggleProjects()" class="rb ne yf zf yg nh li il lm bf _h" :disabled="isLoading">

            <span x-show="isLoading">Loading...</span>

            <span x-show="!isLoading && isExpanded">Hide Projects</span>

            <span x-show="!isLoading && !isExpanded">See All Projects</span>
        </button>
    </div>
    @endif
    
</section>
