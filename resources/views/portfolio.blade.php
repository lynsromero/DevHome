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
        <div class="animate_top la ib kd yg">
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
            <button class="rb ne yf zf yg nh li il lm">
              All Projects
            </button>
          </li>
          <li class="jb">
            <button class="rb ne yf zf yg nh li il lm">
              Trending
            </button>
          </li>
          <li class="jb">
            <button class="rb ne yf zf yg nh li il lm">
              Recent Upload
            </button>
          </li>
          <li class="jb">
            <button class="rb ne yf zf yg nh li il lm">
              Most Popular
            </button>
          </li>          
        </ul>
      </div>
    </div>
    <div class="-ud-mx-4 sb wd productcard">
      @foreach ($projects as $project)
        <div class="oc tf bl/2 gn/3 qb">
          <div class="animate_top k eb">
            <div class="ke se">
              <img src="{{ asset("$project->thumbnail")}}"
                alt="portfolio" class="oc productimg" />
            </div>
            <div class="k ca ma -ud-mt-20 ne cf hj fg ag yg hi">
              <span class="yh ta qb fh nh">
                @if(is_array($project->tech_stack  ))
                {{ implode(', ', $project->tech_stack  ) }}
            
            @endif
             
              </span>
              <h3 class="zh mj va dh lh">{{ $project->title }}</h3>
              <a href="#" class="vi ui rb oe ve rf gg fh nh li aj">
                View Details
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

</section>