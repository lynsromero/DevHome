@forelse ($projects as $project)
  <div class="oc tf bl/2 gn/3 qb">
    <div class="animate_top k eb">
      <div class="ke se">
        <img src="{{ asset("$project->thumbnail")}}" alt="portfolio" class="oc productimg" />
      </div>
      <div class="k ca ma -ud-mt-20 ne cf hj fg ag yg hi">
        <span class="yh ta qb fh nh">
          @if (!empty($project->tech_stack) && is_array($project->tech_stack))
            {{ \Illuminate\Support\Str::limit(implode(', ', $project->tech_stack), 30, '...') }}
          @else
            No Tech Stack
          @endif
        </span>
        <h3 class="zh mj va dh lh">{{ $project->title }}</h3>
        <a href="#" class="vi ui rb oe ve rf gg fh nh li aj">
          View Details
        </a>
      </div>
    </div>
  </div>
  @empty
  <div class="oc tf w-full text-center py-10">
        <h4 class="zh mj va dh lh">No projects found for this technology.</h4>
        <p>Try selecting a different filter.</p>
    </div>
@endforelse