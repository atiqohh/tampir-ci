// sweetalert2

const swal = $('.swal').data('swal');

if(swal){
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: swal
      })
}

$(document).on('click', '.btn-hapus', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan lagi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
    }).then((result) => {
        if (result.isConfirmed) {
          document.location.href=href;
        }   
    })
})

$(document).on('click', '.btn-hapus-admin', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan lagi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
    }).then((result) => {
        if (result.isConfirmed) {
          document.location.href=href;
        } 
    })
})