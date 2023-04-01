@extends('admin.layouts.app')
@section('content')
<div class="col-md-12 col-lg-12">
   <div class="row row-cols-1">
      <div class="overflow-hidden d-slider1 ">
         <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-01"
                        class="text-center circle-progress-01 circle-progress circle-progress-primary"
                        data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                        <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                        </svg>
                     </div>
                     <div class="progress-detail">
                        <p class="mb-2">Total User</p>
                        <h4 class="counter">{{ $count_user}}</h4>
                     </div>
                  </div>
               </div>
            </li>
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-02"
                        class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0"
                        data-max-value="100" data-value="80" data-type="percent">
                        <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                        </svg>
                     </div>
                     <div class="progress-detail">
                        <p class="mb-2">Total Pengaduan</p>
                        <h4 class="counter">{{ $cout_pengaduan}}</h4>
                     </div>
                  </div>
               </div>
            </li>
            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
               <div class="card-body">
                  <div class="progress-widget">
                     <div id="circle-progress-03"
                        class="text-center circle-progress-01 circle-progress circle-progress-primary"
                        data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                        <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                        </svg>
                     </div>
                     <div class="progress-detail">
                        <p class="mb-2">Total Tanggapan</p>
                        <h4 class="counter">{{ $count_tanggapan}}</h4>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
         <div class="swiper-button swiper-button-next"></div>
         <div class="swiper-button swiper-button-prev"></div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-lg-4">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div class="bg-soft-primary rounded p-4">
                  <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M21.25 12.0005C21.25 17.1095 17.109 21.2505 12 21.2505C6.891 21.2505 2.75 17.1095 2.75 12.0005C2.75 6.89149 6.891 2.75049 12 2.75049C17.109 2.75049 21.25 6.89149 21.25 12.0005Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M15.4316 14.9429L11.6616 12.6939V7.84692" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </div>
               <div>
                  <span>Menunggu Konfirmasi</span>
               </div>
            </div>
            <div class="text-center">
               <h2 class="counter">{{ $count_konfirmasi }}</h2>

            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div class="bg-soft-warning rounded p-4">
                  <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </div>
               <div>
                  <span class="mb-2">Dalam Proses</span>
               </div>
            </div>
            <div class="text-center">
               <h2 class="counter">{{ $count_proses }}</h2>

            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-4">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <div class="rounded p-4 bg-soft-success">
                  <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M8.43994 12.0002L10.8139 14.3732L15.5599 9.6272" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </div>
               <div>
                  <span>Selesai</span>
               </div>
            </div>
            <div class="text-center">
               <h2 class="counter">{{ $count_selesai}}</h2>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection