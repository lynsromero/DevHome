<div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Emails</h6>
                        <a href="{{ route('email.list') }}">Show All</a>
                    </div>
                    @foreach ($dashemails as $email)
                    <div class="d-flex align-items-center border-bottom py-3">                        
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">{{ $email->email_address }}</h6>
                                <small>{{ $email->created_at->diffForHumans() }}</small>
                            </div>
                            <span>{{ $email->subject }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>