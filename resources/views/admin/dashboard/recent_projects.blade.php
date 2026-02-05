<div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Projects</h6>
                <a href="{{ route('list.project') }}">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead style="text-align: center">
                        <tr class="text-white">
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Views</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr class="text-center">
                                <td class="text-start">{{ $project->title }}</td>
                                <td>{{ $project->created_at->format('d M Y') }}</td>
                                <td>
                                    <span class="badge bg-dark"><i class="fa fa-eye me-1"></i> {{ $project->views ?? 0 }}</span>
                                </td>
                                <td style="width: 170px;">
                                    <a href="{{ route('project.view', $project->slug) }}"
                                        class="btn btn-sm btn-sm-square btn-outline-info m-1" target='_blank' title="View"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-sm btn-sm-square btn-outline-warning m-1" title="Edit"><i
                                            class="fa fa-edit" target='_blank'></i></a>


                                    <form action="{{ route('projects.destroy', $project->slug) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-sm-square btn-outline-primary m-1"
                                            onclick="return confirm('Delete this project?')" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>