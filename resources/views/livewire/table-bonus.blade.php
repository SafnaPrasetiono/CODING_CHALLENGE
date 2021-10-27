<div>
    <div class="col-12">
        <div class="d-block rounded shadow overflow-hidden">

            <div class="alert alert-secondary rounded-0 p-3 mb-0">
                <div class="d-flex justify-content-between">
                    <h2 class="m-0">Table Bonus Pembayaran Buruh</h2>
                    @if(auth('admin')->user())
                    <a href="/create" class="btn btn-primary">Tambah</a>
                    @endif
                </div>
            </div>
            <div class="p-3">
                @if(count($data) != 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Buruh A</th>
                                <th scope="col">Buruh B</th>
                                <th scope="col">Buruh C</th>
                                <th>Pembayaran</th>
                                @if(auth('admin')->user() or auth('user')->user())
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; ?>
                            @foreach($data as $dt)
                            <tr>
                                <th scope="row"><?php echo $number; ?></th>
                                <td>Rp. {{ number_format((($dt->buruh_a / 100 ) * $dt->pembayaran ),'0',',','.') }}</td>
                                <td>Rp. {{ number_format((($dt->buruh_b / 100 ) * $dt->pembayaran ),'0',',','.') }}</td>
                                <td>Rp. {{ number_format((($dt->buruh_c / 100 ) * $dt->pembayaran ),'0',',','.') }}</td>
                                <td>Rp. {{ number_format($dt->pembayaran,'0',',','.') }}</td>
                                @if(auth('admin')->user() or auth('user')->user())
                                <td>
                                    @if(auth('user')->user())
                                    <a href="/detail/{{ $dt->id }}" class="btn btn-info">Detail</a>
                                    @endif
                                    @if(auth('admin')->user())
                                    <a href="/detail/{{ $dt->id }}" class="btn btn-info">Detail</a>
                                    <a href="/update/{{ $dt->id }}" class="btn btn-primary">Update</a>
                                    <a type="button" wire:click="deleteConfrim({{ $dt->id }})" class="btn btn-danger">Delete</a>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            <?php $number++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    @if ($data->hasPages())
                    {{ $data->links('livewire.table-paginations') }}
                    @endif
                    <div>
                        <select wire:model="pages" class="form-select w-100" aria-label="Default select example">
                            <option value="5" selected>5 Pages</option>
                            <option value="15">15 Pages</option>
                            <option value="30">30 pages</option>
                            <option value="0">All</option>
                        </select>
                    </div>
                </div>
                @else
                <div class="text-center">
                    <div class="d-block p-5">
                        <h3>Oops!</h3>
                        <h5>Data Bonus Pembayaran Masih Kosong.</h5>
                        <h5>Lakukan Registrasi sebagai admin dan tambahkan data bonus pembayaran buruh.</h5>
                    </div>
                </div>
                @endif
            </div>

        </div>

    </div>

    @if(Session::has('delete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ Session::get("message") }}',
            showConfirmButton: true,
            timer: 2000
        });
    </script>
    @endif

    <script>
        document.addEventListener('show-delete-Confrim', function() {
            Swal.fire({
                title: "Apa anda yakin?",
                text: "Menghapus data bonus ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('goDelete');
                }
            })

            // Swal.fire({
            //     title: "Apa anda yakin?",
            //     text: "Menghapus data bonus ini!",
            //     showCancelButton: true,
            //     confirmButtonText: 'Delete',
            // }).then((result) => {
            //     /* Read more about isConfirmed, isDenied below */
            //     if (result.isConfirmed) {
            //         Livewire.emit('goDelete');
            //         swal("Pesanan anda telah terhapus!", {
            //             icon: "success",
            //         });
            //     } else if (result.isDenied) {
            //         Swal.fire('Data tetap aman!')
            //     }
            // })
            // Swal.fire({
            //         title: "Apa anda yakin?",
            //         text: "Menghapus data table bonus!",
            //         icon: "warning",
            //         buttons: true,
            //         dangerMode: true,
            //     })
            //     .then((willDelete) => {
            //         if (willDelete) {
            //             Livewire.emit('goDelete');
            //             swal("Pesanan anda telah terhapus!", {
            //                 icon: "success",
            //             });
            //         } else {
            //             swal("Pesanan anda tetap aman!");
            //         }
            //     });
        })
    </script>
</div>