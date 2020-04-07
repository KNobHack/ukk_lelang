@extends('layouts.app')

@section('content-header', 'Detail Lelang')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Harga awal</span>
                                <span class="info-box-number text-center text-muted mb-0">Rp. {{ $lelang->harga_awal }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Harga sekarang</span>
                                <span class="info-box-number text-center text-muted mb-0">Rp. {{ $lelang->harga_sekarang }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Tanggal berakhir</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $lelang->waktu_berakhir->format('d M, Y') }}<span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-red">{{ $lelang->created_at->format('d M, Y') }}</span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-exclamation bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{ $lelang->created_at->format('H:i') }}</span>
                                    <h3 class="timeline-header"><a href="{{ url('/u/' . $lelang->user->id) }}">{{ $lelang->user->nama_lengkap }}</a>Memulai Lelang</h3>
                                    <div class="timeline-body">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-user bg-green"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-comments bg-yellow"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                    <div class="timeline-body">
                                        Take me to your leader!
                                        Switzerland is small and neutral!
                                        We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                        <a class="btn btn-warning btn-sm">View comment</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-green">3 Jan. 2014</span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fa fa-camera bg-purple"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                    <div class="timeline-body">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                        <img src="http://placehold.it/150x100" alt="...">
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-video bg-maroon"></i>

                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>

                                    <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                                    <div class="timeline-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-exclamation bg-red"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>{{ $lelang->waktu_berakhir->format('d M, Y') }}</span>
                                    <h3 class="timeline-header no-border"><a href="{{ url('/u/' . $lelang->user->id) }}">{{ $lelang->user->nama_lengkap }}</a> Mengakhiri lelang</h3>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-secondary"><i class="fas fa-paint-brush"></i>{{ $lelang->asset->game }}</h3>
                <p class="text-muted">{{ $lelang->asset->deskripsi }}</p>

                <h5 class="mt-2">In Game Name</h5>
                <span class="d-block text-muted">{{ $lelang->asset->identifier }}</span>

                <h5 class="mt-3">Genre Game</h5>
                <ul class="list-unstyled text-muted">
                    @foreach($lelang->asset->genres as $genre)
                    <li>{{ $genre->genre }}</li>
                    @endforeach
                </ul>
                <div class="text-center mt-5 mb-3">
                    @if(Auth::user()->id == $lelang->user->id)
                    <a href="{{ url('/assets/' . $lelang->asset->id . '/edit') }}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i>Edit</a>
                    <button href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-account-modal"><i class="fas fa-exclamation"></i>Akhiri lelang</button>
                    @else
                    <a href="#" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i>Ikut lelang</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
