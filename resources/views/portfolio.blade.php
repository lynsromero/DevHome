<section x-data="
              {
                showCards: 'all',
                activeClasses: 'bf _h',
                inactiveClasses: 'vi aj',
              }
            " class="tg wm sn ug xm tn">
  <div class="a">
    <div class="-ud-mx-4 sb wd">
      <div class="oc tf">
        <div class="animate_top la ib kd yg" data-sr-id="8"
          style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2.8s cubic-bezier(0.5, 0, 0, 1), transform 2.8s cubic-bezier(0.5, 0, 0, 1);">
          <span class="yh ta qb ah nh">
            Our Portfolio
          </span>
          <h2 class="zh mj va bh lh lk ll">
            Our Recent Projects
          </h2>
          <p>
            There are many variations of passages of Lorem Ipsum available but
            the majority have suffered alteration in some form.
          </p>
        </div>
      </div>
    </div>

    <div class="-ud-mx-4 sb wd yd">
        <div class="oc tf">
            <ul class="animate_top eb sb wd yd he">            
                <li class="jb">
                    <button class="filter-btn rb ne yf zf yg nh li il lm" data-filter="Laravel">
                        Laravel
                    </button>
                </li>
                <li class="jb">
                    <button class="filter-btn rb ne yf zf yg nh li il lm" data-filter="PHP">
                        PHP
                    </button>
                </li>
                <li class="jb">
                    <button class="filter-btn rb ne yf zf yg nh li il lm" data-filter="MERN">
                        MERN
                    </button>
                </li>
                <li class="jb">
                    <button class="filter-btn rb ne yf zf yg nh li il lm" data-filter="Themes">
                        Themes
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="-ud-mx-4 sb wd productcard" id="ajax-projects-container">
      @include('partials.project_cards')
    </div>
    <div class="oc tf jb" id="see-all-container">
      <button id="load-all-btn" class="rb ne yf zf yg nh li il lm">See All Projects</button>
    </div>

</section>

