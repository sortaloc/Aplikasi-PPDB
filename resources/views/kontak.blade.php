@if (Session::has('sukses'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Kritik dan Saran Anda telah kami terima!'
    })
</script>
@endif
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Kontak</h2>
      <p>Kontak Kami</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-6">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>A108 Adam Street,<br>New York, NY 535022</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Telp.</h3>
              <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>info@example.com<br>contact@example.com</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <i class="bi bi-clock"></i>
              <h3>Jadwal</h3>
              <p>Monday - Friday<br>9:00AM - 05:00PM</p>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">
        <form action="{{ route('kritiksaran.store') }}" method="post" class="info-box">
          @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="nama" class="form-control" placeholder="masukan nama anda.." required>
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="masukan email anda.." required>
            </div>


            <div class="col-md-12">
              <textarea class="form-control" name="pesan" rows="6" placeholder="masukan pesan anda.." required></textarea>
            </div>

            <div class="col-md-12 text-center">


              <button class="btn btn-primary" style="    line-height: 0;
    padding: 15px 40px;
    border-radius: 4px;
    transition: 0.5s;
    color: #fff;
    background: #4154f1;
    box-shadow: 0px 5px 25px rgb(65 84 241 / 30%);" type="submit">Kirim</button>
            </div>

          </div>
        </form>

      </div>

    </div>

  </div>

</section><!-- End Contact Section -->