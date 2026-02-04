<section x-data="{
    currentFilter: new URLSearchParams(window.location.search).get('filter') || 'all',
    isLoading: false,
    isExpanded: false, // Track if we are showing all or just 6
    activeClasses: 'bf _h',
    inactiveClasses: 'vi aj',

    reinitializeAnimations() {
        if (typeof ScrollReveal !== 'undefined') {
            ScrollReveal().reveal('.animate_top', {
                delay: 200, distance: '50px', origin: 'top', interval: 100
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
                                class="filter-btn rb ne yf zf yg nh li il lm" 
                                x-text="cat"></button>
                    </li>
                </template>
            </ul>
        </div>
    </div>

    <div class="-ud-mx-4 sb wd productcard" id="ajax-projects-container" style="transition: opacity 0.3s ease;">
        @include('partials.project_cards')
    </div>

    <div class="project-button oc tf jb" style="margin-top: 40px; text-align: center;">
    <button @click="toggleProjects()" 
            class="rb ne yf zf yg nh li il lm bf _h"
            :disabled="isLoading">
        
        <span x-show="isLoading">Loading...</span>

        <span x-show="!isLoading && isExpanded">Hide Projects</span>

        <span x-show="!isLoading && !isExpanded">See All Projects</span>
    </button>
</div>
</section>