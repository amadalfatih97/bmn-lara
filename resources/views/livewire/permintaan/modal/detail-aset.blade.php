<div class="modal fade detailAsetModal" role="dialog" wire:ignore.self tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content shadow-lg ">
            <div class="modal-header">
                <h6 class="modal-title">Detail Aset</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div> 
            <div class="modal-body">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{asset('images/asets/thumb.png')}}" class="img-fluid" alt="...">
                    </div>

                    <div class="card-body">
                        <p class="fw-bolder">Keterangan</p> 
                        <hr class="dropdown-divider" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dui elit, ultricies nec purus sit amet, ultrices tempus eros. Vivamus enim nibh, consectetur sed nunc eu, pretium dictum metus. Sed tincidunt justo eu nulla euismod mollis. In blandit, lectus semper blandit auctor, augue eros dignissim nisl, vitae volutpat risus nulla vel metus. Sed dictum a massa vel convallis. Ut tincidunt erat a orci gravida, malesuada elementum nisi sollicitudin. Aliquam erat volutpat.

                            Cras sit amet libero tristique, lacinia nibh eu, imperdiet diam. Sed felis ex, consequat eget elit eget, hendrerit viverra nisl. Sed ut nibh nec augue posuere ultrices ut vitae erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas consequat tristique interdum. Praesent nec lacus imperdiet, commodo massa a, vulputate mi. Quisque tincidunt molestie odio at aliquet. Praesent erat ligula, volutpat a ex quis, iaculis auctor mauris.
                            
                            Mauris lobortis tempus nisi, nec iaculis diam. Praesent sed ornare lorem. Fusce cursus libero sit amet elit tempor vulputate. Cras sed convallis dui, a luctus purus. Ut in iaculis lectus. Praesent convallis sapien nec semper vestibulum. Aenean malesuada felis dolor, at malesuada massa laoreet vel. Curabitur at risus nibh. Sed sed lorem sit amet lectus laoreet condimentum et et libero. Curabitur sed enim hendrerit, dapibus enim id, eleifend orci. Praesent consequat nisi mi, at porttitor massa malesuada a. Mauris a neque felis. Aliquam tempus est ut odio tristique laoreet. Phasellus tortor tellus, consectetur blandit ullamcorper volutpat, suscipit vel urna. Fusce vulputate mattis imperdiet. Suspendisse enim urna, iaculis ac venenatis quis, aliquet et urna.</p>
                            
                        <div class="d-grid">
                            <button class="btn btn-primary">Request</button>
                        </div>

                        <hr class="dropdown-divider" />
                        <p class="fw-bolder">Riwayat Aset</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($barangs as $index => $item) --}}
                                <tr>
                                    <td>1</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>  </td>
                                </tr>
                            {{-- @endforeach --}}
                            </tbody>
                            {{-- @if (count($orderProducts) <= 0) --}}
                                {{-- <tbody id="rowitem">
                                    <tr>
                                        <th colspan="4">Item Kosong</th>
                                    </tr>
                                    
                                </tbody> --}}
                            {{-- @endif --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>