<div
    x-data="{open:false}"
    x-show="open"
    @sweet-alert-confirm.window="
        const id = event.detail.id
        Swal.fire({
            title: event.detail.title,
            text: 'Apakah Anda Yakin ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                {{-- $wire.delete(id).then(result => {
                    Swal.fire({
                        text: 'Data Sukses Dihapus',
                        icon: 'success'
                    });
                }) --}}
                $wire.delete(id)
            }
        });
    "
>
</div>
