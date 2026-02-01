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
    <div class="-ud-mx-4 sb wd productcard">
      @include('partials.project_cards')
    </div>
    <div class="oc tf jb" id="see-all-container">
      <button id="load-all-btn" class="rb ne yf zf yg nh li il lm">See All Projects</button>
    </div>

</section>

@push('scripts')
<script>
$(document).ready(function() {
    let loadAll = false;
    let currentFilter = 'all';

    function fetchProjects() {
        $.ajax({
            url: "{{ route('home') }}", // Ensure this points to your index route
            type: "GET",
            data: { 
                filter: currentFilter, 
                load_all: loadAll 
            },
            beforeSend: function() {
                $('#projects-wrapper').css('opacity', '0.5');
            },
            success: function(data) {
                $('#projects-wrapper').html(data).css('opacity', '1');
                
                // If "See All" was clicked, we keep showing all, otherwise show the button
                if (loadAll) {
                    $('#see-all-container').hide();
                } else {
                    $('#see-all-container').show();
                }
            }
        });
    }

    // When a category button is clicked
    $('.filter-btn').on('click', function(e) {
        e.preventDefault();
        
        // Toggle Active Classes (adjust classes 'bf' '_h' based on your theme)
        $('.filter-btn').removeClass('bf _h'); 
        $(this).addClass('bf _h');

        // Get the value (Laravel, PHP, etc.)
        currentFilter = $(this).data('filter');
        
        // Reset loadAll to false when switching categories (shows only 6)
        // Set to true if you want to see everything in that category immediately
        fetchProjects();
    });

    // "See All" button logic
    $('#load-all-btn').on('click', function() {
        loadAll = true;
        fetchProjects();
    });
});
</script>
@endpush