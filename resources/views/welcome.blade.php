@extends('layouts.main')

@section('content')
<section class="top_matches pb-8 pb-md-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gx-0 gx-lg-4">
                <div class="top_matches__main">
                    <div class="row w-100 mb-8 mb-md-10">
                        <div class="col-12">
                            <div class="top_matches__title d-flex align-items-center gap-2 mb-4">
                                <img src="assets/images/icon/king.png" alt="Icon">
                                <h3>Daily sure tips</h3>
                            </div>
                            <div class="top_matches__content">
                                <div class="singletab">
                                    <ul class=" d-flex align-items-center gap-4 flex-wrap mb-5 mb-md-6">
                                    <li class="nav-links">
                                            <a href="/verify"
                                                class="  active d-flex align-items-center gap-2 py-2 px-4 p3-bg rounded-17"><img
                                                    src="{{url('assets/images/icon/soccer-icon.png')}}" alt="Icon">Try Correct score predictions🎯</a>
                                        
                                                    <br>
                                                    <a href="/verify"
                                                class="  active d-flex align-items-center gap-2 py-2 px-4 p3-bg rounded-17"><img
                                                    src="{{url('assets/images/icon/soccer-icon.png')}}" alt="Icon">Try Half time / full time score ⌛</a>
                                                </li>

                                    </ul>
                                    <div class="tabcontents">
                                        @foreach($dailysuretips as $dailysuretip)
                                            <div class="tabitem active">
                                                <div class="top_matches__cmncard p2-bg p-4 rounded-3 mb-4">
                                                    <div class="row gx-0 gy-xl-0 gy-7">
                                                        <div class="col-xl-5 col-xxl-4">
                                                            <div class="top_matches__clubname">
                                                                <div
                                                                    class="top_matches__cmncard-right d-flex align-items-start justify-content-between pb-4 mb-4 gap-4 ">
                                                                    <div class="d-flex align-items-center gap-1">
                                                                        <img src="assets/images/icon/floorball.png"
                                                                            alt="Icon"> <span
                                                                            class="fs-eight cpoint">{{ $dailysuretip->league }}</span>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center gap-4 pe-xl-15 flex-nowrap flex-xl-wrap">
                                                                        <span class="fs-eight cpoint">Today,
                                                                            {{ $dailysuretip->time }}</span>
                                                                        <div class="d-flex align-items-center gap-1">
                                                                            <img src="assets/images/icon/updwon.png"
                                                                                alt="Icon">
                                                                            <img src="assets/images/icon/t-shart.png"
                                                                                alt="Icon">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="top_matches__cmncard-left d-flex align-items-center justify-content-between pe-xl-10">
                                                                    <div>
                                                                        <div
                                                                            class="d-flex align-items-center gap-2 mb-4">
                                                                            <!-- <img src="assets/images/icon/sivasspor.png"
                                                                                alt="Icon"> -->
                                                                            <span
                                                                                class="fs-seven cpoint">{{ $dailysuretip->homeTeam }}</span>
                                                                        </div>
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <!-- <img src="assets/images/icon/trabzonspor.png"
                                                                                alt="Icon"> -->
                                                                            <span
                                                                                class="fs-seven cpoint">{{ $dailysuretip->awayTeam }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center gap-4 position-relative pe-xl-15">
                                                                        <span
                                                                            class="v-line lg d-none d-xl-block"></span>
                                                                        <div class="d-flex flex-column gap-5">
                                                                            <img class="cpoint"
                                                                                src="assets/images/icon/line-chart.png"
                                                                                alt="Icon">
                                                                            <img class="cpoint"
                                                                                src="assets/images/icon/star.png"
                                                                                alt="Icon">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-xxl-8">
                                                            <div class="top_matches__clubdata">
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0 pb-0">
                                                                        <thead>
                                                                            <tr class="text-center">
                                                                                <th scope="col"><span
                                                                                        class="fs-eight">Results</span>
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="pt-4">
                                                                                    <div
                                                                                        class="top_matches__innercount d-flex align-items-center gap-2  ">
                                                                                        <div
                                                                                            class="top_matches__innercount-item clickable-active py-1 px-8 rounded-3 n11-bg container"
                                                                                            style="text-align: center;">
                                                                                            <span>{{ $dailysuretip->result }}</span>
                                                                                            <span></span>
                                                                                    </div>

                                                                </div>
                                                                </td>


                                                                </tr>

                                                                </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
</section>

@endsection
